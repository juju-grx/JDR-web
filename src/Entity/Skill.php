<?php

namespace App\Entity;

use App\Entity\Asset;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SkillRepository;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill extends Asset
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $useType;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity=Element::class, inversedBy="skills")
     */
    private $element;

    /**
     * @ORM\ManyToMany(targetEntity=TypeClass::class, inversedBy="skills")
     */
    private $typeClass;

    public function getUseType(): ?string
    {
        return $this->useType;
    }

    public function setUseType(string $useType): self
    {
        $this->useType = $useType;

        return $this;
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

    public function getElement(): ?Element
    {
        return $this->element;
    }

    public function setElement(?Element $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getTypeClass(): ?TypeClass
    {
        return $this->typeClass;
    }

    public function setTypeClass(?TypeClass $typeClass): self
    {
        $this->typeClass = $typeClass;

        return $this;
    }
}
