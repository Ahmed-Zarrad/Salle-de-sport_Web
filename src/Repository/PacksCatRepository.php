<?php

namespace App\Repository;

use App\Entity\PacksCat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PacksCat|null find($id, $lockMode = null, $lockVersion = null)
 * @method PacksCat|null findOneBy(array $criteria, array $orderBy = null)
 * @method PacksCat[]    findAll()
 * @method PacksCat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PacksCatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PacksCat::class);
    }

    // /**
    //  * @return PacksCat[] Returns an array of PacksCat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PacksCat
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
