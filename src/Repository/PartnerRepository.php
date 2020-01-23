<?php


namespace App\Repository;


use App\Entity\Partner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class PartnerRepository extends ServiceEntityRepository
{
    private $manager;
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct
    (
        ManagerRegistry $registry,
        EntityManagerInterface $manager
    )
    {
        parent::__construct($registry, Partner::class);
        $this->repository = $manager->getRepository(Partner::class);
        $this->manager = $manager;
    }

    public function savePartner($name, $CPF){
        $partner = new Partner();

        $partner->setName($name);
        $partner->setCNPJ($CPF);

        $this->manager->persist($partner);
        $this->manager->flush();

    }


}