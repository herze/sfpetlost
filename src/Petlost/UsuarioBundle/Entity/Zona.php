<?php
namespace Petlost\UsuarioBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\Common\Collections\Collection;
/**
 * Petlost\UsuarioBundle\Entity\Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petlost\UsuarioBundle\Entity\ZonaRepository")
 */
class Zona
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
        /**
    * @ORM\Column(type="point", nullable=true)
    */
    protected $coordinates;
    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    */
    protected $direccion;
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", cascade={"remove"})
     */
    protected $usuario;
    /**
     * @var integer $anuncio
     *
     * @ORM\ManyToOne(targetEntity="Petlost\FrontBundle\Entity\Anuncio", inversedBy="zonas")
     * @Assert\Type("Petlost\FrontBundle\Entity\Anuncio")
     */
    private $anuncio;
    
    /**
     * @ORM\ManyToOne(targetEntity="Petlost\UsuarioBundle\Entity\Mensaje")
     */
    protected $mensaje;
    
    public function __toString() {
        return "".$this->getDireccion();
    }
    
    public function setLongitude($lon)
    {
        if ($this->coordinates == null)
        {
            $this->coordinates = \Petlost\UsuarioBundle\Lib\Point::fromLonLat($lon, 0);
        }
        else
        {
            $this->coordinates->setLongitude($lon);
        }
    }
  
    public function getLongitude()
    {
        return $this->coordinates == null ? 0 : $this->coordinates->getLongitude();
    }
  
    public function setLatitude($lat)
    {
        if ($this->coordinates == null)
        {

            $this->coordinates = \Petlost\UsuarioBundle\Lib\Point::fromLonLat(0, $lat);
        }
        else
        {
            $this->coordinates->setLatitude($lat);
        }
    }
  
    public function getLatitude()
    {
        return $this->coordinates == null ? 0 : $this->coordinates->getLatitude();
    }
    
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set coordinates
     *
     * @param point $coordinates
     * @return Zona
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    
        return $this;
    }

    /**
     * Get coordinates
     *
     * @return point 
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Zona
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set usuario
     *
     * @param \Petlost\UsuarioBundle\Entity\Usuario $usuario
     * @return Zona
     */
    public function setUsuario(\Petlost\UsuarioBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Petlost\UsuarioBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set anuncio
     *
     * @param \Petlost\FrontBundle\Entity\Anuncio $anuncio
     * @return Zona
     */
    public function setAnuncio(\Petlost\FrontBundle\Entity\Anuncio $anuncio = null)
    {
        $this->anuncio = $anuncio;
    
        return $this;
    }

    /**
     * Get anuncio
     *
     * @return \Petlost\FrontBundle\Entity\Anuncio 
     */
    public function getAnuncio()
    {
        return $this->anuncio;
    }

   

    /**
     * Set mensaje
     *
     * @param \Petlost\UsuarioBundle\Entity\Mensaje $mensaje
     * @return Zona
     */
    public function setMensaje(\Petlost\UsuarioBundle\Entity\Mensaje $mensaje = null)
    {
        $this->mensaje = $mensaje;
    
        return $this;
    }

    /**
     * Get mensaje
     *
     * @return \Petlost\UsuarioBundle\Entity\Mensaje 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }
}