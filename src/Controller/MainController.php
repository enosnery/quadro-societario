<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



/**
 * Class MainController
 * @Route("v2", name="main_")
 */
class MainController{

    public function main(){
        return new Response('funfando');
    }

    /**
     * @Route("company/add", name="save_company", methods={"POST"})
     * @param Request $request
     */
    public function save(Request $request){

    }
}
