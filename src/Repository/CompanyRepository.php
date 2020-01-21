<?php


namespace App\Repository;


use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class CompanyRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct
    (
        ManagerRegistry $registry,
        EntityManagerInterface $manager
    )
    {
        parent::__construct($registry, Company::class);
        $this->manager = $manager;
    }

    public function saveCompany($name, $CNPJ){
        $company = new Company();

        $company->setName($name);
        $company->setCNPJ($CNPJ);

        $this->manager->persist($company);
        $this->manager->flush();

    }

}