<?php

namespace App\Entity;

use App\Repository\MobRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MobRepository::class)
 */
class Mob extends Pnj
{

    /**
     * @ORM\OneToOne(targetEntity=Statistical::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $statistical;

    public function getStatistical(): ?Statistical
    {
        return $this->statistical;
    }

    public function setStatistical(Statistical $statistical): self
    {
        $this->statistical = $statistical;

        return $this;
    }
}
