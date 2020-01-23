<?php


namespace App\Controller;


use App\Entity\Company;
use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CompanyController
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * @Route("/company", name="getCompany")
     * @return Response
     */
    public function getCompanyList(){
       $resposta = $this->companyRepository->findAll();
        $encoders = [
            new JsonEncoder()
        ];
        $normalizer = new ObjectNormalizer();
        $normalizers = [$normalizer];
        $serializer  = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($resposta, $this->companyRepository, 'json');
        return new Response($json);
    }
    /**
     * @Route("/company", name="getCompany")
     * @return Response
     */
    public function save(){
        $this->companyRepository->saveCompany();
        return new Response("Empresa salva com sucesso");
    }

}