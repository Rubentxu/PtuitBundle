<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * amiguetes\PtuitBundle\Entity\Perfil
 *
 * @ORM\Table(name="Perfil")
 * @ORM\Entity
 */
class Perfil {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     * @Assert\NotBlank( message = "Por favor, escriba su nombre completo",
     * groups={"registro"})
     * @Assert\MinLength(limit=6 , message = "Por favor, escriba al menos 6 caracteres",
     * groups={"registro"})
     * @Assert\MaxLength(limit=30, message = "Por favor,no exceda de los 30 caracteres",
     * groups={"registro"})
     */
    private $nombre;
    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="integer", length=20, nullable=true)
     */
    private $telefono;
    /**
     * @var integer $edad
     * @ORM\Column(name="nacimiento", type="datetime", nullable=true)
     * @Assert\Type(type="\DateTime")
     */
    private $fechaNacimiento;
    /**
     * @var text $intereses
     *
     * @ORM\Column(name="intereses", type="text", nullable=true)
     */
    private $intereses;
    /**
     * @var text $biografia
     *
     * @ORM\Column(name="biografia", type="text", nullable=true)
     */
    private $biografia;
    /**
     * @var string $localizacion
     *
     * @ORM\Column(name="localizacion", type="string", length=200, nullable=true)
     */
    private $localizacion;
    /**
     * @var string $web
     *
     * @ORM\Column(name="web", type="string", length=200, nullable=true)
     */
    private $web;    
    /**
     * @ORM\OneToOne(targetEntity="Usuario", inversedBy="perfil")      
     */
    private $usuario;
    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $privacidad;


    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     */
    public function setFechaNacimiento($fecha) {
        $this->fechaNacimiento = $fecha;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    /**
     * Set intereses
     *
     * @param text $intereses
     */
    public function setIntereses($intereses) {
        $this->intereses = $intereses;
    }

    /**
     * Get intereses
     *
     * @return text 
     */
    public function getIntereses() {
        return $this->intereses;
    }

    /**
     * Set biografia
     *
     * @param text $biografia
     */
    public function setBiografia($biografia) {
        $this->biografia = $biografia;
    }

    /**
     * Get biografia
     *
     * @return text 
     */
    public function getBiografia() {
        return $this->biografia;
    }

    /**
     * Set localizacion
     *
     * @param string $localizacion
     */
    public function setLocalizacion($localizacion) {
        $this->localizacion = $localizacion;
    }

    /**
     * Get localizacion
     *
     * @return string 
     */
    public function getLocalizacion() {
        return $this->localizacion;
    }

    /**
     * Set web
     *
     * @param string $web
     */
    public function setWeb($web) {
        $this->web = $web;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb() {
        return $this->web;
    }


    /**
     * Set privacidad
     *
     * @param smallint $privacidad
     */
    public function setPrivacidad($privacidad)
    {
        $this->privacidad = $privacidad;
    }

    /**
     * Get privacidad
     *
     * @return smallint 
     */
    public function getPrivacidad()
    {
        return $this->privacidad;
    }
}