<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * amiguetes\PtuitBundle\Entity\MiniUrl
 *
 * @ORM\Table(name="Mini_Url")
 * @ORM\Entity
 */
class MiniUrl
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
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=200, nullable=true)
     */
    private $url;

    /**
     * @var string $mini
     *
     * @ORM\Column(name="mini", type="string", length=9, nullable=true)
     */
    private $mini;

    /**
     * @var datetime $expira
     *
     * @ORM\Column(name="expira", type="datetime", nullable=true)
     */
    private $expira;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarioId", referencedColumnName="id")
     * })
     */
    private $usuarioid;



   

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
     * @return string 
     */
    public function getMini()
    {
        return $this->mini;
    }

    /**
     * Set expira
     *
     * @param datetime $expira
     */
    public function setExpira($expira)
    {
        $this->expira = $expira;
    }

    /**
     * Get expira
     *
     * @return datetime 
     */
    public function getExpira()
    {
        return $this->expira;
    }

    /**
     * Set usuarioid
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $usuarioid
     */
    public function setUsuarioid(\amiguetes\PtuitBundle\Entity\Usuario $usuarioid)
    {
        $this->usuarioid = $usuarioid;
    }

    /**
     * Get usuarioid
     *
     * @return amiguetes\PtuitBundle\Entity\Usuario 
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }
}