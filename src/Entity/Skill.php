<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $value_test;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_test;

    /**
     * @ORM\ManyToOne(targetEntity=Element::class, inversedBy="skills")
     * @ORM\JoinColumn(nullable=true)
     */
    private $element;

    /**
     * @ORM\ManyToOne(targetEntity=TypeClass::class, inversedBy="skills")
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeClass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getValueTest(): ?int
    {
        return $this->value_test;
    }

    public function setValueTest(int $value_test): self
    {
        $this->value_test = $value_test;

        return $this;
    }

    public function getTypeTest(): ?string
    {
        return $this->type_test;
    }

    public function setTypeTest(string $type_test): self
    {
        $this->type_test = $type_test;

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
