<?php

namespace Petlost\CiudadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
     public function listarAction($ciudad) {
        $em=$this->getDoctrine()->getManager();
        $ciudades=$em->getRepository('CiudadBundle:Ciudad')->findAll();
        return $this->render('CiudadBundle:Default:listar.html.twig',array(
            'ciudades'=>$ciudades
        ));
    }
}
