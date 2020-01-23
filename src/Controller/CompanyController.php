<?php


namespace App\Controller;


use App\Repository\CompanyRepository;
use http\Env\Request;
use http\Env\Response;

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