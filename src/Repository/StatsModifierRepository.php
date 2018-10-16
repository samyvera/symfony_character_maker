<?php

namespace App\Repository;

use App\Entity\StatsModifier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StatsModifier|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatsModifier|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatsModifier[]    findAll()
 * @method StatsModifier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatsModifierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StatsModifier::class);
    }

//    /**
//     * @return StatsModifier[] Returns an array of StatsModifier objects
//     */
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
    public function findOneBySomeField($value): ?StatsModifier
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
