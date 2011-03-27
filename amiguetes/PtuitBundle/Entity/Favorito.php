<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\Favorito
 */
class Favorito
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
     * @var integer $mensajeid
     */
    private $mensajeid;


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
     * Set mensajeid
     *
     * @param integer $mensajeid
     */
    public function setMensajeid($mensajeid)
    {
        $this->mensajeid = $mensajeid;
    }

    /**
     * Get mensajeid
     *
     * @return integer $mensajeid
     */
    public function getMensajeid()
    {
        return $this->mensajeid;
    }
}