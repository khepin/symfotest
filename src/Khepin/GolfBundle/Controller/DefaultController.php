<?php

namespace Khepin\GolfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('KhepinGolfBundle:Default:index.html.twig', array('name' => $name));
    }
}
