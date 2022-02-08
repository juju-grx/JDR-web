<?php

namespace App\Entity;

use App\Repository\StatisticalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatisticalRepository::class)
 */
class Statistical
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $physical_attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $magic_attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $physical_resistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $magic_resistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $physical_stamina;

    /**
     * @ORM\Column(type="integer")
     */
    private $magic_stamina;

    /**
     * @ORM\Column(type="integer")
     */
    private $speed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhysicalAttack(): ?int
    {
        return $this->physical_attack;
    }

    public function setPhysicalAttack(int $physical_attack): self
    {
        $this->physical_attack = $physical_attack;

        return $this;
    }

    public function getMagicAttack(): ?int
    {
        return $this->magic_attack;
    }

    public function setMagicAttack(int $magic_attack): self
    {
        $this->magic_attack = $magic_attack;

        return $this;
    }

    public function getPhysicalResistance(): ?int
    {
        return $this->physical_resistance;
    }

    public function setPhysicalResistance(int $physical_resistance): self
    {
        $this->physical_resistance = $physical_resistance;

        return $this;
    }

    public function getMagicResistance(): ?int
    {
        return $this->magic_resistance;
    }

    public function setMagicResistance(int $magic_resistance): self
    {
        $this->magic_resistance = $magic_resistance;

        return $this;
    }

    public function getPhysicalStamina(): ?int
    {
        return $this->physical_stamina;
    }

    public function setPhysicalStamina(int $physical_stamina): self
    {
        $this->physical_stamina = $physical_stamina;

        return $this;
    }

    public function getMagicStamina(): ?int
    {
        return $this->magic_stamina;
    }

    public function setMagicStamina(int $magic_stamina): self
    {
        $this->magic_stamina = $magic_stamina;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }
}
