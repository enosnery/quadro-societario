<?php


namespace App\Controller;


use App\Repository\CompanyRepository;

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