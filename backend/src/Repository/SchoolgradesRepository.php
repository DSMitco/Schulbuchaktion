<?php

namespace App\Repository;

use App\Entity\Schoolgrade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Schoolgrade>
 *
 * @method Schoolgrade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schoolgrade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schoolgrade[]    findAll()
 * @method Schoolgrade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolgradesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schoolgrade::class);
    }

    public function findByGrade($grade): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.grade = :grade')
            ->setParameter('grade', $grade)
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Schoolgrade[] Returns an array of Schoolgrade objects
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

    //    public function findOneBySomeField($value): ?Schoolgrade
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
