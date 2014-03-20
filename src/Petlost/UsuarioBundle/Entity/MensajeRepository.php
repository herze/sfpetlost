<?php
namespace Petlost\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MensajeRepository extends EntityRepository{
    
    
    public function findMensaje($anuncio){
        $em=$this->getEntityManager();
        $dql="SELECT m,a FROM UsuarioBundle:Mensaje m JOIN m.anuncio a WHERE m.anuncio=:anuncio";
        $query=$em->createQuery($dql);
        
        $query->setParameter('anuncio', $anuncio[0]->getId());
        return $query->getOneOrNullResult();
                
    }
}
