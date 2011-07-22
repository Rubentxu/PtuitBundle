<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * amiguetes\PtuitBundle\Entity\Tag
 *
 * @ORM\Table(name="Tag")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $texto
     *
     * @ORM\Column(name="texto", type="string", length=12, nullable=true)
     */
    private $texto;

    /**
     * @var Mensaje
     *
     * @ORM\ManyToMany(targetEntity="Mensaje", mappedBy="tagid")
     */
    private $mensajeid;
    
    /**
     * @var datetime $fecha
     *
     * @ORM\Column(name="creado", type="datetime", nullable=true)
     */
    private $creado;

    public function __construct()
    {
        $this->mensajeid = new ArrayCollection();
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
     * Set texto
     *
     * @param string $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
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
     * Add mensajeid
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje $mensajeid
     */
    public function addMensajeid(\amiguetes\PtuitBundle\Entity\Mensaje $mensajeid)
    {
        $this->mensajeid[] = $mensajeid;
    }

    /**
     * Get mensajeid
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajeid()
    {
        return $this->mensajeid;
    }
}