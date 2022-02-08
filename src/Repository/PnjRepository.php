<?php

namespace App\Repository;

use App\Entity\Pnj;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pnj|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pnj|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pnj[]    findAll()
 * @method Pnj[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PnjRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pnj::class);
    }

    // /**
    //  * @return Pnj[] Returns an array of Pnj objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pnj
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
