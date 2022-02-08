<?php

namespace App\Entity;

use App\Repository\ElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToOne(targetEntity=Element::class, inversedBy="evolution", cascade={"persist", "remove"})
     */
    private $evolution;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="element", orphanRemoval=true)
     */
    private $skills;

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

    public function getEvolution(): ?self
    {
        return $this->evolution;
    }

    public function setEvolution(?self $evolution): self
    {
        $this->evolution = $evolution;

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
}
