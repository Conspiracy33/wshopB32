<?php

namespace App\Repository;

use App\Entity\ResponsablePedago;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ResponsablePedago|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponsablePedago|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponsablePedago[]    findAll()
 * @method ResponsablePedago[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsablePedagoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ResponsablePedago::class);
    }

//    /**
//     * @return ResponsablePedago[] Returns an array of ResponsablePedago objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResponsablePedago
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
