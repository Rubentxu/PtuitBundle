<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * amiguetes\PtuitBundle\Entity\Mensaje
 *
 * @ORM\Table(name="Mensaje_Interno")
 * @ORM\Entity
 */
class Mensaje_Interno {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var datetime $creado
     *
     * @ORM\Column(name="creado", type="datetime", nullable=true)
     */
    private $creado;
    /**
     * @var datetime $modificado
     *
     * @ORM\Column(name="modificado", type="datetime", nullable=true)
     */
    private $modificado;
    /**
     * @var string $texto
     *
     * @ORM\Column(name="texto", type="string", length=160, nullable=true)
     */
    private $texto;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="desde_Usuario", referencedColumnName="id")
     */
    private $recibidos_de_Usuario;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="hacia_Usuario", referencedColumnName="id")
     */
    private $enviados_a_Usuario;
    
    
    

    

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
     * Set recibidos_de_Usuario
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $recibidosDeUsuario
     */
    public function setRecibidosDeUsuario(\amiguetes\PtuitBundle\Entity\Usuario $recibidosDeUsuario)
    {
        $this->recibidos_de_Usuario = $recibidosDeUsuario;
    }

    /**
     * Get recibidos_de_Usuario
     *
     * @return amiguetes\PtuitBundle\Entity\Usuario 
     */
    public function getRecibidosDeUsuario()
    {
        return $this->recibidos_de_Usuario;
    }

    /**
     * Set enviados_a_Usuario
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $enviadosAUsuario
     */
    public function setEnviadosAUsuario(\amiguetes\PtuitBundle\Entity\Usuario $enviadosAUsuario)
    {
        $this->enviados_a_Usuario = $enviadosAUsuario;
    }

    /**
     * Get enviados_a_Usuario
     *
     * @return amiguetes\PtuitBundle\Entity\Usuario 
     */
    public function getEnviadosAUsuario()
    {
        return $this->enviados_a_Usuario;
    }
}