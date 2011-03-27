<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\UsuarioBloqueado
 */
class UsuarioBloqueado
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
     * @var integer $usuarioblockid
     */
    private $usuarioblockid;


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
     * Set usuarioblockid
     *
     * @param integer $usuarioblockid
     */
    public function setUsuarioblockid($usuarioblockid)
    {
        $this->usuarioblockid = $usuarioblockid;
    }

    /**
     * Get usuarioblockid
     *
     * @return integer $usuarioblockid
     */
    public function getUsuarioblockid()
    {
        return $this->usuarioblockid;
    }
}