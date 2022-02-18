<?php

namespace App\Entity;

use App\Entity\Asset;
use App\Entity\TypeClass;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SpecialActionRepository;

/**
 * @ORM\Entity(repositoryClass=SpecialActionRepository::class)
 */
class SpecialAction extends Asset
{
    /**
     * @ORM\OneToOne(targetEntity=TypeClass::class, inversedBy="specialAction")
     */
    private $typeClass;

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
