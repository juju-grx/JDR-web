<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race extends Speciality
{
    /**
     * @ORM\Column(type="float")
     */
    private $max_size;

    /**
     * @ORM\Column(type="float")
     */
    private $min_size;

    /**
     * @ORM\OneToMany(targetEntity=Entity::class, mappedBy="race")
     */
    private $entities;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxSize(): ?float
    {
        return $this->max_size;
    }

    public function setMaxSize(float $max_size): self
    {
        $this->max_size = $max_size;

        return $this;
    }

    public function getMinSize(): ?float
    {
        return $this->min_size;
    }

    public function setMinSize(float $min_size): self
    {
        $this->min_size = $min_size;

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
            $entity->setRace($this);
        }

        return $this;
    }

    public function removeEntity(Entity $entity): self
    {
        if ($this->entities->removeElement($entity)) {
            // set the owning side to null (unless already changed)
            if ($entity->getRace() === $this) {
                $entity->setRace(null);
            }
        }

        return $this;
    }
}
