<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\MiniUrl
 */
class MiniUrl
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var string $mini
     */
    private $mini;

    /**
     * @var integer $usuarioid
     */
    private $usuarioid;

    /**
     * @var string $expira
     */
    private $expira;


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
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set mini
     *
     * @param string $mini
     */
    public function setMini($mini)
    {
        $this->mini = $mini;
    }

    /**
     * Get mini
     *
     * @return string $mini
     */
    public function getMini()
    {
        return $this->mini;
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
     * Set expira
     *
     * @param string $expira
     */
    public function setExpira($expira)
    {
        $this->expira = $expira;
    }

    /**
     * Get expira
     *
     * @return string $expira
     */
    public function getExpira()
    {
        return $this->expira;
    }
}