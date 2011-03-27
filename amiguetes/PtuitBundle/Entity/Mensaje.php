<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\Mensaje
 */
class Mensaje
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nombreusuario
     */
    private $nombreusuario;

    /**
     * @var datetime $fecha
     */
    private $fecha;

    /**
     * @var string $texto
     */
    private $texto;

    /**
     * @var integer $interno
     */
    private $interno;

    /**
     * @var string $replicado
     */
    private $replicado;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreusuario
     *
     * @param string $nombreusuario
     */
    public function setNombreusuario($nombreusuario)
    {
        $this->nombreusuario = $nombreusuario;
    }

    /**
     * Get nombreusuario
     *
     * @return string $nombreusuario
     */
    public function getNombreusuario()
    {
        return $this->nombreusuario;
    }

    /**
     * Set fecha
     *
     * @param datetime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return datetime $fecha
     */
    public function getFecha()
    {
        return $this->fecha;
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
     * @return string $texto
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set interno
     *
     * @param integer $interno
     */
    public function setInterno($interno)
    {
        $this->interno = $interno;
    }

    /**
     * Get interno
     *
     * @return integer $interno
     */
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * Set replicado
     *
     * @param string $replicado
     */
    public function setReplicado($replicado)
    {
        $this->replicado = $replicado;
    }

    /**
     * Get replicado
     *
     * @return string $replicado
     */
    public function getReplicado()
    {
        return $this->replicado;
    }
}