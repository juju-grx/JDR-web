<?php

namespace App\Entity;

use App\Repository\PnjRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PnjRepository::class)
 */
class Pnj extends Caracter
{
    
}
