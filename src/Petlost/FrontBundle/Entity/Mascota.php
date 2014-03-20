<?php
namespace Petlost\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Petlost\FrontBundle\Entity\Petlost
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Mascota {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $nombre;
    /**
     * @var string $categoria
     *
     * @ORM\Column(name="categoria", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $categoria;
    /**
     * @var string $raza
     *
     * @ORM\Column(name="raza", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $raza;
    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\Choice({"macho", "hembra"})
    */
    private $sexo;
    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Choice({"ninguno", "collar","chip","tatuaje"})
    */
    private $identificacion;
    /**
     * @var string $enfermedad
     *
     * @ORM\Column(name="enfermedad", type="string", length=100, nullable=true)
     */
    private $enfermedad;
    /**
     * @ORM\OneToMany(targetEntity="Petlost\FrontBundle\Entity\Foto", mappedBy="mascota", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $fotos;
    
    /**
     * @ORM\OneToMany(targetEntity="Petlost\FrontBundle\Entity\Anuncio", mappedBy="mascota", cascade={"persist"})
     */
    protected $anuncios;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fotos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Mascota
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     * @return Mascota
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set raza
     *
     * @param string $raza
     * @return Mascota
     */
    public function setRaza($raza)
    {
        $this->raza = $raza;
    
        return $this;
    }

    /**
     * Get raza
     *
     * @return string 
     */
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Mascota
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set identificacion
     *
     * @param string $identificacion
     * @return Mascota
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    
        return $this;
    }

    /**
     * Get identificacion
     *
     * @return string 
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set enfermedad
     *
     * @param string $enfermedad
     * @return Mascota
     */
    public function setEnfermedad($enfermedad)
    {
        $this->enfermedad = $enfermedad;
    
        return $this;
    }

    /**
     * Get enfermedad
     *
     * @return string 
     */
    public function getEnfermedad()
    {
        return $this->enfermedad;
    }

    /**
     * Add fotos
     *
     * @param \Petlost\FrontBundle\Entity\Foto $fotos
     * @return Mascota
     */
    public function addFoto(\Doctrine\Common\Collections\Collection $fotos)
    {
        $this->fotos = $fotos;
        foreach ($fotos as $foto) {
            $foto->setUser($this);
        }
    }

    /**
     * Remove fotos
     *
     * @param \Petlost\FrontBundle\Entity\Foto $fotos
     */
    public function removeFoto(\Petlost\FrontBundle\Entity\Foto $fotos)
    {
        $this->fotos->removeElement($fotos);
    }

    /**
     * Get fotos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotos()
    {
        return $this->fotos;
    }

    /**
     * Add anuncios
     *
     * @param \Petlost\FrontBundle\Entity\Anuncio $anuncios
     * @return Mascota
     */
    public function addAnuncio(\Petlost\FrontBundle\Entity\Anuncio $anuncios)
    {
        $this->anuncios[] = $anuncios;
    
        return $this;
    }

    /**
     * Remove anuncios
     *
     * @param \Petlost\FrontBundle\Entity\Anuncio $anuncios
     */
    public function removeAnuncio(\Petlost\FrontBundle\Entity\Anuncio $anuncios)
    {
        $this->anuncios->removeElement($anuncios);
    }

    /**
     * Get anuncios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnuncios()
    {
        return $this->anuncios;
    }
}