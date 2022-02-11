<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SpecialityRepository;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
 * @ORM\Entity(repositoryClass=SpecialityRepository::class)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"element" = "Element", "race" = "Race", "typeClass" = "TypeClass"})
 */
abstract class Speciality
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $rate_physical_attack;

    /**
     * @ORM\Column(type="float")
     */
    private $rate_magic_attack;

    /**
     * @ORM\Column(type="float")
     */
    private $rate_physical_resistance;

    /**
     * @ORM\Column(type="float")
     */
    private $rate_magic_resistance;

    /**
     * @ORM\Column(type="float")
     */
    private $rate_physical_stamina;

    /**
     * @ORM\Column(type="float")
     */
    private $rate_magic_stamina;

    /**
     * @ORM\Column(type="float")
     */
    private $rate_speed;

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

    public function getRatePhysicalAttack(): ?float
    {
        return $this->rate_physical_attack;
    }

    public function setRatePhysicalAttack(float $rate_physical_attack): self
    {
        $this->rate_physical_attack = $rate_physical_attack;

        return $this;
    }

    public function getRateMagicAttack(): ?float
    {
        return $this->rate_magic_attack;
    }

    public function setRateMagicAttack(float $rate_magic_attack): self
    {
        $this->rate_magic_attack = $rate_magic_attack;

        return $this;
    }

    public function getRatePhysicalResistance(): ?float
    {
        return $this->rate_physical_resistance;
    }

    public function setRatePhysicalResistance(float $rate_physical_resistance): self
    {
        $this->rate_physical_resistance = $rate_physical_resistance;

        return $this;
    }

    public function getRateMagicResistance(): ?float
    {
        return $this->rate_magic_resistance;
    }

    public function setRateMagicResistance(float $rate_magic_resistance): self
    {
        $this->rate_magic_resistance = $rate_magic_resistance;

        return $this;
    }

    public function getRatePhysicalStamina(): ?float
    {
        return $this->rate_physical_stamina;
    }

    public function setRatePhysicalStamina(float $rate_physical_stamina): self
    {
        $this->rate_physical_stamina = $rate_physical_stamina;

        return $this;
    }

    public function getRateMagicStamina(): ?float
    {
        return $this->rate_magic_stamina;
    }

    public function setRateMagicStamina(float $rate_magic_stamina): self
    {
        $this->rate_magic_stamina = $rate_magic_stamina;

        return $this;
    }

    public function getRateSpeed(): ?float
    {
        return $this->rate_speed;
    }

    public function setRateSpeed(float $rate_speed): self
    {
        $this->rate_speed = $rate_speed;

        return $this;
    }
}
