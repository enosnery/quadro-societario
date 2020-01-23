<?php


namespace App\Controller;


use App\Repository\PartnerRepository;

class PartnerController
{
    /**
     * @var PartnerRepository
     */
    private $partnerRepository;

    /**
     * @Route("/partner", name="getPartner")
     * @return Response
     */
    public function getPartnerList(){
        $resposta = $this->partnerRepository->findAll();
        $encoders = [
            new JsonEncoder()
        ];
        $normalizer = new ObjectNormalizer();
        $normalizers = [$normalizer];
        $serializer  = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($resposta, $this->partnerRepository, 'json');
        return new Response($json);
    }
    /**
     * @Route("/partner", name="getPartner")
     * @return Response
     */
    public function save(){
        $this->partnerRepository->savePartner();
        return new Response("Sócio salvo com sucesso");
    }

}