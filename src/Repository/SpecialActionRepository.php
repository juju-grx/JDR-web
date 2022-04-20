<?php

namespace App\Repository;

use App\Entity\SpecialAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialAction[]    findAll()
 * @method SpecialAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialAction::class);
    }

    // /**
    //  * @return SpecialAction[] Returns an array of SpecialAction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecialAction
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
