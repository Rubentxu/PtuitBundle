<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\MensajeTag
 */
class MensajeTag
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $mensajeid
     */
    private $mensajeid;

    /**
     * @var integer $tagid
     */
    private $tagid;


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

    /**
     * Set tagid
     *
     * @param integer $tagid
     */
    public function setTagid($tagid)
    {
        $this->tagid = $tagid;
    }

    /**
     * Get tagid
     *
     * @return integer $tagid
     */
    public function getTagid()
    {
        return $this->tagid;
    }
}