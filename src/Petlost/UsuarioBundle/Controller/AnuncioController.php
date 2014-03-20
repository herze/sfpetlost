<?php
namespace Petlost\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Petlost\FrontBundle\Entity\Perdido;
use Petlost\FrontBundle\Entity\Anuncio;
use Petlost\FrontBundle\Entity\Mascota;
use Petlost\UsuarioBundle\Entity\Zona;
use Petlost\FrontBundle\Entity\Foto;
use Petlost\FrontBundle\Form\PerdidoType;


class AnuncioController  extends Controller{
    
    public function addanuncioAction()
    {
        $perdido=new Perdido();
        $form=$this->createForm(new PerdidoType(),$perdido,array(
            'action'=>  $this->generateUrl('usuario_registro'),
            'method'=>'POST',    
        ))
                ->add('Registrar','submit')
                ;
        return $this->render('UsuarioBundle:Anuncio:addanuncio.html.twig',array(
            'formulario'=>$form->createView(),
        ));
    }
}
