<?php

namespace App\Repository;

use App\Entity\Alfajor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Alfajor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alfajor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alfajor[]    findAll()
 * @method Alfajor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlfajorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Alfajor::class);
    }
}
