<?php

namespace App\Repository;

use App\Entity\Bookprice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bookprice>
 *
 * @method Bookprice|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bookprice|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bookprice[]    findAll()
 * @method Bookprice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookpriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bookprice::class);
    }

    //    /**
    //     * @return Bookprice[] Returns an array of Bookprice objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Bookprice
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
