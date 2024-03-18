<?php

namespace App\Repository;

use App\Entity\Schoolgrades;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Schoolgrades>
 *
 * @method Schoolgrades|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schoolgrades|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schoolgrades[]    findAll()
 * @method Schoolgrades[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolgradesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schoolgrades::class);
    }

    //    /**
    //     * @return Schoolgrades[] Returns an array of Schoolgrades objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Schoolgrades
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
