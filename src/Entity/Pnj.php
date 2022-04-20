<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PnjRepository;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
 * @ORM\Entity(repositoryClass=PnjRepository::class)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"mob" = "Mob"})
 */
class Pnj extends Entity
{
    
}
