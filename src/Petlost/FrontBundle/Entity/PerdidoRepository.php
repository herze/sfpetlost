<?php
namespace Petlost\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Petlost\UsuarioBundle\Entity\Zona;

class PerdidoRepository extends EntityRepository{
    
    public function findAnunciosNuevos($ciudad)
    {
        $em=  $this->getEntityManager();
        $fecha=new \DateTime('now');
        
        $query="SELECT p,a,m,f "
                . "FROM FrontBundle:Perdido p JOIN p.anuncio a JOIN a.mascota m JOIN m.fotos f "
                . "WHERE a.created <:fecha";
        $consulta=$em->createQuery($query);
        $consulta->setParameter('fecha', $fecha);
        $consulta->setMaxResults(10);
        return $consulta->getResult();
    }
    
    public function findMisAnuncios($id)
    {
        $em=  $this->getEntityManager();
        
        $query="SELECT p,a "
                . "FROM FrontBundle:Perdido p JOIN p.anuncio a "
                . "WHERE p.usuario =:usuario";
        $consulta=$em->createQuery($query);
        $consulta->setParameter('usuario', $id);
        
        return $consulta->getResult();
    }
    
    public function findAnuncio($slug){
        $em= $this->getEntityManager();
        $query="SELECT p,a,m,f,z FROM FrontBundle:Perdido p JOIN p.anuncio a JOIN a.mascota m JOIN m.fotos f JOIN a.zonas z "
                . "WHERE a.slug=:slug";
        $consulta=$em->createQuery($query);
        $consulta->setParameter('slug', $slug);
        $consulta->setMaxResults(1);
        
        return $consulta->getOneOrNullResult();
    }
    
    
    
}