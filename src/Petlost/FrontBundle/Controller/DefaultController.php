<?php
namespace Petlost\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Petlost\FrontBundle\Entity\Perdido;

class DefaultController extends Controller
{
    public function portadaAction($ciudad=null)
    {
        $em=  $this->getDoctrine()->getManager();
        $anuncios=$em->getRepository('FrontBundle:Perdido')->findAnunciosNuevos($ciudad);
        
        return $this->render('FrontBundle:Default:index.html.twig',array(
            'anuncios'=>$anuncios
        ));
    }
    
    public function showanuncioAction($ciudad=null,$slug)
    {
        $anuncio=new Perdido();
        $em=  $this->getDoctrine()->getManager();
        $anuncio=$em->getRepository('FrontBundle:Perdido')->findAnuncio($slug);
        return $this->render('FrontBundle:Default:showanuncio.html.twig',array(
            'anuncio'=>$anuncio
        ));
    }
}
