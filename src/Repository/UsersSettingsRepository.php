<?php

namespace App\Repository;

use App\Entity\UsersSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsersSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersSettings[]    findAll()
 * @method UsersSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersSettings::class);
    }

    // /**
    //  * @return UsersSettings[] Returns an array of UsersSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsersSettings
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
