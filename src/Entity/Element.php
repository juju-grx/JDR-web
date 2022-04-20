<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Repository\ElementRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ElementRepository::class)
 */
class Element extends Speciality
{
    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity=Entity::class, mappedBy="element")
     */
    private $entities;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="element", orphanRemoval=true)
     */
    private $skills;

    /**
     * @ORM\OneToOne(targetEntity=Element::class, inversedBy="element", cascade={"persist", "remove"})
     * @JoinColumn(name="evolution_id", referencedColumnName="id", nullable=true)
     */
    private $evolution;

    /**
     * @ORM\OneToOne(targetEntity=Element::class, mappedBy="evolution", cascade={"persist", "remove"})
     */
    private $element;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Entity[]
     */
    public function getEntities(): Collection
    {
        return $this->entities;
    }

    public function addEntity(Entity $entity): self
    {
        if (!$this->entities->contains($entity)) {
            $this->entities[] = $entity;
            $entity->setElement($this);
        }

        return $this;
    }

    public function removeEntity(Entity $entity): self
    {
        if ($this->entities->removeElement($entity)) {
            // set the owning side to null (unless already changed)
            if ($entity->getElement() === $this) {
                $entity->setElement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setElement($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getElement() === $this) {
                $skill->setElement(null);
            }
        }

        return $this;
    }

    public function getEvolution(): ?self
    {
        return $this->evolution;
    }

    public function setEvolution(?self $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }

    public function getElement(): ?self
    {
        return $this->element;
    }

    public function setElement(?self $element): self
    {
        // unset the owning side of the relation if necessary
        if ($element === null && $this->element !== null) {
            $this->element->setEvolution(null);
        }

        // set the owning side of the relation if necessary
        if ($element !== null && $element->getEvolution() !== $this) {
            $element->setEvolution($this);
        }

        $this->element = $element;

        return $this;
    }
}
