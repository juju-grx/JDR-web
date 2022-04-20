<?php

namespace App\Entity;

use App\Repository\TypeClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeClassRepository::class)
 */
class TypeClass extends Speciality
{
    /**
     * @ORM\OneToOne(targetEntity=SpecialAction::class, cascade={"persist", "remove"}, mappedBy="typeClass")
     */
    private $special_action;

    /**
     * @ORM\OneToMany(targetEntity=Caracter::class, mappedBy="class")
     */
    private $caracters;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="typeClass")
     */
    private $skills;

    public function __construct()
    {
        $this->caracters = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getSpecialAction(): ?SpecialAction
    {
        return $this->special_action;
    }

    public function setSpecialAction(SpecialAction $special_action): self
    {
        $this->special_action = $special_action;

        return $this;
    }

    /**
     * @return Collection|Caracter[]
     */
    public function getCaracters(): Collection
    {
        return $this->caracters;
    }

    public function addCaracter(Caracter $caracter): self
    {
        if (!$this->caracters->contains($caracter)) {
            $this->caracters[] = $caracter;
            $caracter->setClass($this);
        }

        return $this;
    }

    public function removeCaracter(Caracter $caracter): self
    {
        if ($this->caracters->removeElement($caracter)) {
            // set the owning side to null (unless already changed)
            if ($caracter->getClass() === $this) {
                $caracter->setClass(null);
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
            $skill->setTypeClass($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getTypeClass() === $this) {
                $skill->setTypeClass(null);
            }
        }

        return $this;
    }
}
