<?php

namespace App\Repository;

use App\Entity\Documento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Documento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Documento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Documento[]    findAll()
 * @method Documento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Documento::class);
    }

    // /**
    //  * @return Documento[] Returns an array of Documento objects
    //  */

    public function findByPlanificacionField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 3)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
     public function findByMedicionField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 4)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
     public function findByIDField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 5)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
     public function findByComprasField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 6)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
     public function findByProduccionINField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 7)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
     public function findByProducYogurtField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 8)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
     public function findByVentasField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 9)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
     public function findByGestMantField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 10)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
     public function findByCapitalHumField()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.area = :val')
            ->setParameter('val', 11)
            ->orderBy('d.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Documento
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
