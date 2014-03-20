<?php

namespace Petlost\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Petlost\UsuarioBundle\Entity\Usuario;
use Petlost\UsuarioBundle\Entity\Zona;
use Petlost\UsuarioBundle\Form\UsuarioType;
use Petlost\UsuarioBundle\Form\ZonaType;
use Symfony\Component\Security\Core\SecurityContext;
use Petlost\FrontBundle\Entity\Anuncio;
use Petlost\FrontBundle\Entity\Perdido;

class DefaultController extends Controller
{
    
    public function loginAction($ciudad=null){
        
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        
        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        
        return $this->render('UsuarioBundle:Default:login.html.twig', array(
            'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
            'error'         => $error
        ));
    }
    
    public function indexAction($ciudad=null){
        $usuario=new Usuario();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $mensaje=new \Petlost\UsuarioBundle\Entity\Mensaje();
        $anuncios[]=new Anuncio();
        $zonas[]=null;
        $em=  $this->getDoctrine()->getManager();
        $anuncios=$em->getRepository('FrontBundle:Perdido')->findMisAnuncios($usuario->getId());
        $zonas=$em->getRepository('UsuarioBundle:Zona')->findAnunciosRelevantesCerc($usuario->getId());
        $mizona=$em->getRepository('UsuarioBundle:Zona')->findBy(array('usuario'=>$usuario->getId()));
        $mensaje=$em->getRepository('UsuarioBundle:Mensaje')->findMensaje($anuncios);
        
        
        return $this->render('UsuarioBundle:Default:index.html.twig',array(
            'anuncios'=>$anuncios,
            'zonas'=>$zonas,
            'mizona'=>$mizona,
            'mensaje'=>$mensaje,
        ));
    }
    
    public function addzonaAction()
    {
        
        $zona=new Zona();
        $formZona=$this->createFormBuilder($zona,array('action'=>  $this->generateUrl('usuario_addzona'),'method'=>'POST'))
                ->add('longitude','text')
                ->add('latitude','text')
                ->add('direccion','text',array('required'=>false))
                ->add('Registrar','submit')
                ->getForm();
        
        $formZona->handleRequest($this->getRequest());
        var_dump($formZona->isValid());
        if($formZona->isValid())
        {
            $usuario=  $this->get('security.context')->getToken()->getUser();
            
            $zona=$formZona->getData();
            $zona->setUsuario($usuario);
            $em=  $this->getDoctrine()->getManager();
            $em->persist($zona);
            $em->flush();
            
            return $this->redirect($this->generateUrl('usuario_homepage'));
        }
        return $this->render('UsuarioBundle:Default:addzona.html.twig',array(
            'formulario'=>$formZona->createView(),
        ));
    }
    
    public function registroAction($ciudad=null) {
        
        $usuario= new Usuario();
        $usuario->setCreated(new \DateTime('now'));
        $usuario->setUpdated(new \DateTime('now'));
        //Formulario para el usuario
        $form=  $this->createForm(new UsuarioType(),$usuario,array(
            'action'=>  $this->generateUrl('usuario_registro'),
            'method'=>'POST',    
        ))
                ->add('Registrar','submit')
                ;
        $zona = new Zona();
        //formulario para la zona
        $formZona=$this->createFormBuilder($zona)
                ->add('longitude','text')
                ->add('latitude','text')
                ->add('direccion','text',array('required'=>false))
                ->getForm();
        
        $form->handleRequest($this->getRequest());
        $formZona->handleRequest($this->getRequest());
        
        
        if($form->isValid())
        {
            $usuario->setSalt(md5(time()));
            //obtenemos el usuario para codificar el password
            $usuario=$form->getData();
            $zona=$formZona->getData();
            var_dump($zona);
            $factory=  $this->get('security.encoder_factory');
            $codificador=$factory->getEncoder($usuario);
            $password=$codificador->encodePassword($usuario->getPassword(),$usuario->getSalt());
            $usuario->setPassword($password);
            $zona->setUsuario($usuario);
            $em=  $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->persist($zona);
            $em->flush();
            return $this->redirect($this->generateUrl('portada'));
        }
        
        
        return $this->render('UsuarioBundle:Default:registro.html.twig',array(
            'form'=>$form->createView(),
            'formZona'=>$formZona->createView(),
        ));
    }
}