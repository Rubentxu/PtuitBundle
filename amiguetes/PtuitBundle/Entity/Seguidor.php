<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\Seguidor
 */
class Seguidor
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $usuarioid
     */
    private $usuarioid;

    /**
     * @var integer $seguidorid
     */
    private $seguidorid;


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
     * Set usuarioid
     *
     * @param integer $usuarioid
     */
    public function setUsuarioid($usuarioid)
    {
        $this->usuarioid = $usuarioid;
    }

    /**
     * Get usuarioid
     *
     * @return integer $usuarioid
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }

    /**
     * Set seguidorid
     *
     * @param integer $seguidorid
     */
    public function setSeguidorid($seguidorid)
    {
        $this->seguidorid = $seguidorid;
    }

    /**
     * Get seguidorid
     *
     * @return integer $seguidorid
     */
    public function getSeguidorid()
    {
        return $this->seguidorid;
    }
}