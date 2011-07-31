<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * amiguetes\PtuitBundle\Entity\Avatar
 *
 * @ORM\Table(name="Avatar")
 * @ORM\Entity
 */
class Avatar {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $original;
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $ancho;
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $alto;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $mediaType;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $filename;
    /**
     * @ORM\Column(type="smallint", nullable=true ,unique=true)
     */
    private $url;
    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $creado;
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $modificado;
    /**
     * @ORM\OneToOne(targetEntity="Usuario", inversedBy="perfil")      
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
     * Set original
     *
     * @param boolean $original
     */
    public function setOriginal($original)
    {
        $this->original = $original;
    }

    /**
     * Get original
     *
     * @return boolean 
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set ancho
     *
     * @param smallint $ancho
     */
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;
    }

    /**
     * Get ancho
     *
     * @return smallint 
     */
    public function getAncho()
    {
        return $this->ancho;
    }

    /**
     * Set alto
     *
     * @param smallint $alto
     */
    public function setAlto($alto)
    {
        $this->alto = $alto;
    }

    /**
     * Get alto
     *
     * @return smallint 
     */
    public function getAlto()
    {
        return $this->alto;
    }

    /**
     * Set mediaType
     *
     * @param string $mediaType
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

    /**
     * Get mediaType
     *
     * @return string 
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Set filename
     *
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set url
     *
     * @param smallint $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return smallint 
     */
    public function getUrl()
    {
        return $this->url;
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
     * @param smallint $modificado
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    }

    /**
     * Get modificado
     *
     * @return smallint 
     */
    public function getModificado()
    {
        return $this->modificado;
    }

    /**
     * Set usuario
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $usuario
     */
    public function setUsuario(\amiguetes\PtuitBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return amiguetes\PtuitBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}