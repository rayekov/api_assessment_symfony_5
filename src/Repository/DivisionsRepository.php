<?php

namespace App\Repository;

use App\Entity\Divisions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Divisions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Divisions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Divisions[]    findAll()
 * @method Divisions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DivisionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Divisions::class);
    }

    // /**
    //  * @return Divisions[] Returns an array of Divisions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Divisions
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
