<?php

namespace App\Repository;

use App\Entity\Schoolclass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Schoolclass>
 *
 * @method Schoolclass|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schoolclass|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schoolclass[]    findAll()
 * @method Schoolclass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolclassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schoolclass::class);
    }

    //    /**
    //     * @return Schoolclass[] Returns an array of Schoolclass objects
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

    //    public function findOneBySomeField($value): ?Schoolclass
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
