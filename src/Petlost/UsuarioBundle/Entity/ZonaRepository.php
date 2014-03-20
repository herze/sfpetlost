<?php
namespace Petlost\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ZonaRepository extends EntityRepository{
    
    //Encuentra los anuncios que estan cerca de la zona de un usuario
    public function findAnunciosRelevantesCerc($idusuario)
    {
        $zonasa=new Zona();
        $zonasu=new Zona();
        $resultado=null;
        $em=$this->getEntityManager();
        //Consulta para Conocer todos los anuncios menos el propio
        //$consulta=$em->createQuery('SELECT z,a FROM UsuarioBundle:Zona z JOIN z.anuncio a
        //    WHERE a.usuario!=:idusuario');
        //$consulta->setParameter('idusuario', $idusuario);
        //$zonasa=$consulta->getResult();
        
        //Consulta para obtener las zonas del usuario
        $zonasu=$em->getRepository('UsuarioBundle:Zona')->findAllZona($idusuario);
        foreach($zonasu as $zona)
        {
            $variable='POINT('.$zona->getLongitude().' '.$zona->getLatitude().')';
            
            $radio='1000.0';
            //$dql = "select z from UsuarioBundle:Zona z JOIN z.anuncio a where 
              //      dwithin(z.coordinates,geotext(:zona),:radi)=true AND z.usuario!=:idusuario";
            $dql = "select z,a from UsuarioBundle:Zona z JOIN z.anuncio a where 
                    dwithin(z.coordinates,geotext(:zona),:radi)=true ";
            $query = $em->createQuery($dql);
            $query->setParameter('zona',$variable);
            $query->setParameter('radi',$radio);
            //$query->setParameter('idusuario',$idusuario);
            $zonas=$query->getResult();
            
            if(count($zonas)>0)
            {
                $resultado[]= $query->getResult();
            }

        }
        
        return $resultado;
    }
    
    public function findAllZona($id) {
        $em=  $this->getEntityManager();
        
        $query="SELECT z "
                . "FROM UsuarioBundle:Zona z "
                . "WHERE z.usuario=:usuario";
        $consulta=$em->createQuery($query);
        $consulta->setParameter('usuario', $id);
        
        return $consulta->getResult();
    }
}
