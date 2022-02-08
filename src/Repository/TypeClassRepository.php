<?php

namespace App\Repository;

use App\Entity\TypeClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeClass[]    findAll()
 * @method TypeClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeClass::class);
    }

    // /**
    //  * @return TypeClass[] Returns an array of TypeClass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeClass
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
