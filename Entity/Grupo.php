<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * amiguetes\PtuitBundle\Entity\Grupo
 *
 * @ORM\Table(name="Grupo")
 * @ORM\Entity
 */
class Grupo {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $nombre;
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $url;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $localizacion;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $logo;
    /**
     * @ORM\ManyToMany(targetEntity="Usuario" , mappedBy="grupos")
     */
    private $usuarios;
    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $creado;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modificado;
    /**
     * @ORM\ManyToMany(targetEntity="Usuario" , mappedBy="gruposAdministrados")
     */
    private $administradores;
    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $privacidad;
    
        public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    $this->administradores = new \Doctrine\Common\Collections\ArrayCollection();
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
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set descripcion
     *
     * @param text $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return text 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set localizacion
     *
     * @param string $localizacion
     */
    public function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;
    }

    /**
     * Get localizacion
     *
     * @return string 
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * Set logo
     *
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set creado
     *
     * @param datetime $creado
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
    }

    /**
     * Get creado
     *
     * @return datetime 
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set modificado
     *
     * @param datetime $modificado
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    }

    /**
     * Get modificado
     *
     * @return datetime 
     */
    public function getModificado()
    {
        return $this->modificado;
    }

    /**
     * Set privacidad
     *
     * @param smallint $privacidad
     */
    public function setPrivacidad($privacidad)
    {
        $this->privacidad = $privacidad;
    }

    /**
     * Get privacidad
     *
     * @return smallint 
     */
    public function getPrivacidad()
    {
        return $this->privacidad;
    }

    /**
     * Add usuarios
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $usuarios
     */
    public function addUsuarios(\amiguetes\PtuitBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios[] = $usuarios;
    }

    /**
     * Get usuarios
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * Add administradores
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $administradores
     */
    public function addAdministradores(\amiguetes\PtuitBundle\Entity\Usuario $administradores)
    {
        $this->administradores[] = $administradores;
    }

    /**
     * Get administradores
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAdministradores()
    {
        return $this->administradores;
    }
}