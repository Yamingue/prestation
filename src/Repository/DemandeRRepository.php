<?php

namespace App\Repository;

use App\Entity\DemandeR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandeR|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeR|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeR[]    findAll()
 * @method DemandeR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeR::class);
    }

    // /**
    //  * @return DemandeR[] Returns an array of DemandeR objects
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
    public function findOneBySomeField($value): ?DemandeR
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
