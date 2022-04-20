<?php

namespace App\Entity;

use App\Repository\CaracterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaracterRepository::class)
 */
class Caracter extends Entity
{
    /**
     * @ORM\Column(type="integer")
     */
    private $strenght;

    /**
     * @ORM\Column(type="integer")
     */
    private $agility;

    /**
     * @ORM\Column(type="integer")
     */
    private $intelligence;

    /**
     * @ORM\Column(type="integer")
     */
    private $charisma;

    /**
     * @ORM\Column(type="integer")
     */
    private $constitution;

    /**
     * @ORM\Column(type="integer")
     */
    private $wisdom;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="caracters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Statistical::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Statistical;

    /**
     * @ORM\ManyToOne(targetEntity=TypeClass::class, inversedBy="caracters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $class;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }

    public function getStrenght(): ?int
    {
        return $this->strenght;
    }

    public function setStrenght(int $strenght): self
    {
        $this->strenght = $strenght;

        return $this;
    }

    public function getAgility(): ?int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): self
    {
        $this->agility = $agility;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getCharisma(): ?int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): self
    {
        $this->charisma = $charisma;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): self
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getWisdom(): ?int
    {
        return $this->wisdom;
    }

    public function setWisdom(int $wisdom): self
    {
        $this->wisdom = $wisdom;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStatistical(): ?Statistical
    {
        return $this->Statistical;
    }

    public function setStatistical(Statistical $Statistical): self
    {
        $this->Statistical = $Statistical;

        return $this;
    }

    public function getClass(): ?TypeClass
    {
        return $this->class;
    }

    public function setClass(?TypeClass $class): self
    {
        $this->class = $class;

        return $this;
    }
}
