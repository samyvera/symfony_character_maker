<?php

namespace App\Repository;

use App\Entity\UnitClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UnitClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnitClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnitClass[]    findAll()
 * @method UnitClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnitClassRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UnitClass::class);
    }

//    /**
//     * @return UnitClass[] Returns an array of UnitClass objects
//     */
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
    public function findOneBySomeField($value): ?UnitClass
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
