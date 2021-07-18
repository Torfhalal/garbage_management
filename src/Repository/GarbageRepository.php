<?php

namespace App\Repository;

use App\Entity\Garbage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Garbage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Garbage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Garbage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GarbageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Garbage::class);
    }

    // /**
    //  * @return Garbage[] Returns an array of Garbage objects
    //  */

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAll(): array{
        return $this->createQueryBuilder('p')
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Garbage
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
