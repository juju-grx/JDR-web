<?php

namespace App\Entity;

use App\Repository\SpecialActionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialActionRepository::class)
 */
class SpecialAction
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
     * @ORM\Column(type="integer")
     */
    private $value_test;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_test;

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
}
