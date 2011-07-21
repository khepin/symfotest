<?php

namespace Khepin\GolfBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller {
    
    /**
     * @Route("/hello/{name}", name="hello")
     * @param type $name
     * @return Response 
     */
    public function indexAction($name) {
        return $this->render("KhepinGolfBundle:Hello:index.html.twig", array('name' => $name));
    }
}