<?php

namespace App\Controller;

use http\Env\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController{

    public function main(){
        return new Response('funfando');
    }

    /**
     * @Route("company/add", name="save_company", methods={"POST"})
     */
    public function save(Request $request){

    }
}
