<?php

namespace Khepin\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Khepin\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Khepin\StoreBundle\Entity\Category;

class DefaultController extends Controller
{
    
    /**
     * @Route("/create")
     */
    public function createAction(){
        $c = new Category();
        $c->setName('TV Sets');
        
        $p = new Product();
        $p->setCategory($c);
        $p->setName('Sony Bravia 32"');
        $p->setPrice('11700');
        $p->setDescription('Awesome TV!');
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($p);
        $em->persist($c);
        $em->flush();
        
        return new Response('New product created: '.$p->getName());
    }
    
    /**
     * @Route("/show/{id}", name="show")
     * @Template()
     * @param type $id 
     */
    public function showAction($id){
        $qb = $this->getDoctrine()->getRepository("KhepinStoreBundle:Product")->createQueryBuilder('p');
        $qb->where('p.id = :id')->leftJoin('p.category', 'c')->setParameter('id', $id);
        $qb->addSelect('c');
        $p = $qb->getQuery()->execute();
        $p = $p[0];
        if(!$p){
            throw $this->createNotFoundException('The product with id: '.$id.' does not exist.');
        }

        return array('product' => $p);
    }
}

















