<?php

namespace Khepin\GolfBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller {
    
    /**
     * @Route("/hello/{name}", name="hello")
     * @Template()
     * @param type $name
     * @return Response 
     */
    public function indexAction($name) {
        return array('name' => $name);
    }
    
    /**
     * @Template()
     */
    public function embedAction($name){
        return array('name' => $name);
    }
}