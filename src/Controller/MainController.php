<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MainController{

    /**
     * @Route("/", name="index")
     *
     */
    public function main(){
        return new Response('O Servidor Está Online!');
    }


}
