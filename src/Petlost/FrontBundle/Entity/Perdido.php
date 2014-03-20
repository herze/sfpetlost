<?php
namespace Petlost\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
/**
 * Petlost\FrontBundle\Entity\Perdido
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petlost\FrontBundle\Entity\PerdidoRepository")
 * 
 */
class Perdido {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var datetime $fecha_extravio
     *
     * @ORM\Column(name="fecha_extravio", type="date")
     * @Assert\Date()
     */
    private $fecha_extravio;
    /**
     * @var string $celular
     *
     * @ORM\Column(name="celular", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $celular;
    /**
     * @var integer $anuncio
     *
     * @ORM\ManyToOne(targetEntity="Petlost\FrontBundle\Entity\Anuncio", inversedBy="perdidos", cascade={"persist"})
     * @Assert\Type("Petlost\FrontBundle\Entity\Anuncio")
     */
    private $anuncio;
    /**
     * @var integer $usuario
     *
     * @ORM\ManyToOne(targetEntity="Petlost\UsuarioBundle\Entity\Usuario", inversedBy="perdidos", cascade={"persist"})
     * @Assert\Type("Petlost\UsuarioBundle\Entity\Usuario")
     */
    private $usuario;
    

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
     * Set fecha_extravio
     *
     * @param \DateTime $fechaExtravio
     * @return Perdido
     */
    public function setFechaExtravio($fechaExtravio)
    {
        $this->fecha_extravio = $fechaExtravio;
    
        return $this;
    }

    /**
     * Get fecha_extravio
     *
     * @return \DateTime 
     */
    public function getFechaExtravio()
    {
        return $this->fecha_extravio;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Perdido
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    
        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set anuncio
     *
     * @param \Petlost\FrontBundle\Entity\Anuncio $anuncio
     * @return Perdido
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
     * @return Perdido
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
}