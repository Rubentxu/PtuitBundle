<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * amiguetes\PtuitBundle\Entity\Usuario
 *
 * @ORM\Table(name="Usuario")
 * @ORM\Entity
 */
class Usuario {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string $nick
     *
     * @ORM\Column(name="nick", type="string", length=20, nullable=true)
     */
    private $nick;
    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;
    /**
     * @var string $pass
     *
     * @ORM\Column(name="pass", type="string", length=160, nullable=true)
     */
    private $pass;
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;
    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;
    /**
     * @var integer $edad
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;
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
     * @var string $avatar
     *
     * @ORM\Column(name="avatar", type="string", length=20, nullable=true)
     */
    private $avatar;
    /**
     * @var Mensaje
     *
     * @ORM\ManyToMany(targetEntity="Mensaje", mappedBy="usuarioid")
     */
    private $mensajeid;
    /**
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="Seguidos")
     */
    private $Seguidores;
    /**
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="Seguidores")
     * @ORM\JoinTable(name="Amigos",
     *      joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="amigo_usuario_id", referencedColumnName="id")}
     *      )
     */
    private $Seguidos;
    /**
     * @ORM\OneToMany(targetEntity="Mensaje_Interno", mappedBy="recibidos_de_Usuario")
     */
    private $mensajesRecibidos;
    /**
     * @ORM\OneToMany(targetEntity="Mensaje_Interno", mappedBy="enviados_a_Usuario")
     */
    private $mensajesEnviados;
    /**
     * @ORM\ManyToMany(targetEntity="Mensaje", mappedBy="replicadoPorUsuario")
     */
    private $mensajesReplicados;



    public function __construct() {
        $this->mensajeid = new ArrayCollection();
        $this->Seguidores = new ArrayCollection();
        $this->Seguidos = new ArrayCollection();
        $this->mensajesRecibidos = new ArrayCollection();
        $this->mensajesEnviados = new ArrayCollection();
        $this->mensajesReplicados = new ArrayCollection();
    }

    


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
     * Set nick
     *
     * @param string $nick
     */
    public function setNick($nick)
    {
        $this->nick = $nick;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set pass
     *
     * @param string $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set intereses
     *
     * @param text $intereses
     */
    public function setIntereses($intereses)
    {
        $this->intereses = $intereses;
    }

    /**
     * Get intereses
     *
     * @return text 
     */
    public function getIntereses()
    {
        return $this->intereses;
    }

    /**
     * Set biografia
     *
     * @param text $biografia
     */
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;
    }

    /**
     * Get biografia
     *
     * @return text 
     */
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Set localizacion
     *
     * @param string $localizacion
     */
    public function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;
    }

    /**
     * Get localizacion
     *
     * @return string 
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * Set web
     *
     * @param string $web
     */
    public function setWeb($web)
    {
        $this->web = $web;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add mensajeid
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje $mensajeid
     */
    public function addMensajeid(\amiguetes\PtuitBundle\Entity\Mensaje $mensajeid)
    {
        $this->mensajeid[] = $mensajeid;
    }

    /**
     * Get mensajeid
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajeid()
    {
        return $this->mensajeid;
    }

    /**
     * Add Seguidores
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $seguidores
     */
    public function addSeguidores(\amiguetes\PtuitBundle\Entity\Usuario $seguidores)
    {
        $this->Seguidores[] = $seguidores;
    }

    /**
     * Get Seguidores
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSeguidores()
    {
        return $this->Seguidores;
    }

    /**
     * Add Seguidos
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $seguidos
     */
    public function addSeguidos(\amiguetes\PtuitBundle\Entity\Usuario $seguidos)
    {
        $this->Seguidos[] = $seguidos;
    }

    /**
     * Get Seguidos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSeguidos()
    {
        return $this->Seguidos;
    }

    /**
     * Add mensajesRecibidos
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesRecibidos
     */
    public function addMensajesRecibidos(\amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesRecibidos)
    {
        $this->mensajesRecibidos[] = $mensajesRecibidos;
    }

    /**
     * Get mensajesRecibidos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajesRecibidos()
    {
        return $this->mensajesRecibidos;
    }

    /**
     * Add mensajesEnviados
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesEnviados
     */
    public function addMensajesEnviados(\amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesEnviados)
    {
        $this->mensajesEnviados[] = $mensajesEnviados;
    }

    /**
     * Get mensajesEnviados
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajesEnviados()
    {
        return $this->mensajesEnviados;
    }

    /**
     * Add mensajesReplicados
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje $mensajesReplicados
     */
    public function addMensajesReplicados(\amiguetes\PtuitBundle\Entity\Mensaje $mensajesReplicados)
    {
        $this->mensajesReplicados[] = $mensajesReplicados;
    }

    /**
     * Get mensajesReplicados
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajesReplicados()
    {
        return $this->mensajesReplicados;
    }
}