<?php

namespace App\Repository;

use App\Entity\Profession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProfessionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {

        parent::__construct($registry, Profession::class);

    }
}
