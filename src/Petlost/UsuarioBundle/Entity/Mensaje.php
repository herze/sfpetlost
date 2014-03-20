<?php
namespace Petlost\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Petlost\UsuarioBundle\Entity\MensajeRepository")
 */
class Mensaje {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    protected $descripcion;
    /**
     * @ORM\ManyToOne(targetEntity="Petlost\FrontBundle\Entity\Anuncio")
     */
    protected $anuncio;
    
    /**     
     * @ORM\ManyToOne(targetEntity="Petlost\UsuarioBundle\Entity\Usuario")
     */
    protected $usuario;
    /**
     * @ORM\OneToMany(targetEntity="Petlost\UsuarioBundle\Entity\Zona", mappedBy="mensaje")
     **/
    private $zonas;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->zonas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Mensaje
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set anuncio
     *
     * @param \Petlost\FrontBundle\Entity\Anuncio $anuncio
     * @return Mensaje
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
     * Set usuario
     *
     * @param \Petlost\UsuarioBundle\Entity\Usuario $usuario
     * @return Mensaje
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
     * Add zonas
     *
     * @param \Petlost\UsuarioBundle\Entity\Zona $zonas
     * @return Mensaje
     */
    public function addZona(\Petlost\UsuarioBundle\Entity\Zona $zonas)
    {
        $this->zonas[] = $zonas;
    
        return $this;
    }

    /**
     * Remove zonas
     *
     * @param \Petlost\UsuarioBundle\Entity\Zona $zonas
     */
    public function removeZona(\Petlost\UsuarioBundle\Entity\Zona $zonas)
    {
        $this->zonas->removeElement($zonas);
    }

    /**
     * Get zonas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZonas()
    {
        return $this->zonas;
    }
}