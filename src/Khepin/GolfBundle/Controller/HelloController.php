<?php

namespace Khepin\GolfBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HelloController {
    
    /**
     * @Route("/hello/{name}", name="hello")
     * @param type $name
     * @return Response 
     */
    public function indexAction($name) {
        return new Response('<html><body>Hello '.$name.'!</body></html>');
    }
}