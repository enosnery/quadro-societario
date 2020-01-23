<?php


namespace App\Repository;


use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\Array_;

class CompanyRepository extends ServiceEntityRepository
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
        parent::__construct($registry, Company::class);
        $this->repository = $manager->getRepository(Company::class);
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