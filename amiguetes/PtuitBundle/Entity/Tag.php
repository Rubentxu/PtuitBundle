<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\Tag
 */
class Tag
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $texto
     */
    private $texto;


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
}