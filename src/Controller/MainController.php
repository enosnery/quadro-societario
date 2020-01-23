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


class MainController{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;
    /**
     * @Route("/", name="index")
     *
     */
    public function main(){
        return new Response('O Servidor Está Online!');
    }

    /**
     * @Route("/company", name="getCompany")
     * @return Response
     */
    public function getCompanyList(){
        echo $this->companyRepository;
//       $resposta = $this->companyRepository->findAll();
        $encoders = [
            new JsonEncoder()
        ];
        $normalizer = new ObjectNormalizer();
        $normalizers = [$normalizer];
        $serializer  = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize(["pegada", "chanfle", $this->companyRepository], 'json');
        return new Response($json);
    }

    public function save(){

    }
}
