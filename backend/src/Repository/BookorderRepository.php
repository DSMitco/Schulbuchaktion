<?php

namespace App\Repository;

use App\Entity\Bookorder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bookorder>
 *
 * @method Bookorder|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bookorder|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bookorder[]    findAll()
 * @method Bookorder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookorderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bookorder::class);
    }

    //    /**
    //     * @return Bookorder[] Returns an array of Bookorder objects
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

    //    public function findOneBySomeField($value): ?Bookorder
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
