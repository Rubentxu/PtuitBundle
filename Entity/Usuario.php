<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * amiguetes\PtuitBundle\Entity\Usuario
 *
 * @ORM\Table(name="Usuario")
 * @ORM\Entity
 */
class Usuario implements UserInterface, \Serializable {

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
     * @ORM\Column(name="nick", type="string", length=20, nullable=false)
     * @Assert\NotBlank( message = "Por favor, escriba su nick",groups={"registro"})
     * @Assert\MinLength(limit=2 , message = "Por favor, escriba al menos 2 caracteres",
     * groups={"registro"})
     * @Assert\MaxLength(limit=14, message = "Por favor,no exceda de los 14 caracteres",
     * groups={"registro"})
     */
    private $nick;
    /**
     * @var string $pass
     *
     * @ORM\Column(name="pass", type="string", length=160, nullable=false)
     * @Assert\NotBlank( message = "Por favor, no deje vacio el password",
     * groups={"registro"})
     * @Assert\MinLength(limit=6 , message = "Por favor, escriba al menos 6 caracteres",
     * groups={"registro"})
     * @Assert\MaxLength(limit=15, message = "Por favor,no exceda de los 15 caracteres",
     * groups={"registro"})
     * 
     */
    private $pass;
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     * @Assert\NotBlank(message = "Por favor no deje vacio el email",groups={"registro"})
     * @Assert\Email(message = "Por favor, introduzca un email valido",groups={"registro"})
     */
    private $email;
    /**
     * @ORM\OneToOne(targetEntity="Perfil", mappedBy="usuario", cascade={"persist", "remove"}) 
     * @ORM\JoinColumn(name="perfil_id", referencedColumnName="id") 
     */
    private $perfil;
    /**
     * @ORM\OneToOne(targetEntity="Avatar", mappedBy="usuario", cascade={"persist", "remove"}) 
     * @ORM\JoinColumn(name="avatar_id", referencedColumnName="id") 
     */
    private $avatar;
    /**
     * @var Mensaje
     *
     * @ORM\ManyToMany(targetEntity="Mensaje", mappedBy="$usuarioDeFavoritos")
     */
    private $mensajesFavoritos;
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
    /**
     * @ORM\ManyToMany(targetEntity="Grupo", inversedBy="usuarios")
     * @ORM\JoinTable(name="Usuario_Grupo",
     *      joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="grupo_id", referencedColumnName="id")}
     *      )
     */
    private $grupos;
    /**
     * @ORM\ManyToMany(targetEntity="Grupo", inversedBy="administradores")
     * @ORM\JoinTable(name="Administrador_Grupo",
     *      joinColumns={@ORM\JoinColumn(name="admin_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="grupo_id", referencedColumnName="id")}
     *      )
     */
    private $gruposAdministrados;




    function getRoles() {
        return array('ROLE_USER');
    }

    function getSalt() {
        return FALSE;
    }

    function getUsername() {
        return $this->email;
    }

    function eraseCredentials() {
        return FALSE;
    }

    function equals(UserInterface $user) {
        $this->getUsername() == $user->getUsername();
    }

    public function __construct() {
        $this->mensajesFavoritos = new ArrayCollection();
        $this->Seguidores = new ArrayCollection();
        $this->Seguidos = new ArrayCollection();
        $this->mensajesRecibidos = new ArrayCollection();
        $this->mensajesEnviados = new ArrayCollection();
        $this->mensajesReplicados = new ArrayCollection();
        $this->grupos= new ArrayCollection();
        $this->gruposAdministrados= new ArrayCollection();
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
     * Set nick
     *
     * @param string $nick
     */
    public function setNick($nick) {
        $this->nick = $nick;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick() {
        return $this->nick;
    }

    /**
     * Set pass
     *
     * @param string $pass
     */
    public function setPassword($pass) {
        $this->pass = $pass;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPassword() {
        return $this->pass;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     */
    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar() {
        return $this->avatar;
    }

    /**
     * Add mensajeid
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje $mensajeid
     */
    public function addMensajesFavoritos(\amiguetes\PtuitBundle\Entity\Mensaje $mensaje) {
        $this->mensajesFavoritos = $mensaje;
    }

    /**
     * Get mensajeid
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajesFavoritos() {
        return $this->mensajesFavoritos;
    }

    /**
     * Add Seguidores
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $seguidores
     */
    public function addSeguidores(\amiguetes\PtuitBundle\Entity\Usuario $seguidores) {
        $this->Seguidores[] = $seguidores;
    }

    /**
     * Get Seguidores
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSeguidores() {
        return $this->Seguidores;
    }

    /**
     * Add Seguidos
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $seguidos
     */
    public function addSeguidos(\amiguetes\PtuitBundle\Entity\Usuario $seguidos) {
        $this->Seguidos[] = $seguidos;
    }

    /**
     * Get Seguidos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSeguidos() {
        return $this->Seguidos;
    }

    /**
     * Add mensajesRecibidos
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesRecibidos
     */
    public function addMensajesRecibidos(\amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesRecibidos) {
        $this->mensajesRecibidos[] = $mensajesRecibidos;
    }

    /**
     * Get mensajesRecibidos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajesRecibidos() {
        return $this->mensajesRecibidos;
    }

    /**
     * Add mensajesEnviados
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesEnviados
     */
    public function addMensajesEnviados(\amiguetes\PtuitBundle\Entity\Mensaje_Interno $mensajesEnviados) {
        $this->mensajesEnviados[] = $mensajesEnviados;
    }

    /**
     * Get mensajesEnviados
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajesEnviados() {
        return $this->mensajesEnviados;
    }

    /**
     * Add mensajesReplicados
     *
     * @param amiguetes\PtuitBundle\Entity\Mensaje $mensajesReplicados
     */
    public function addMensajesReplicados(\amiguetes\PtuitBundle\Entity\Mensaje $mensajesReplicados) {
        $this->mensajesReplicados[] = $mensajesReplicados;
    }

    public function getPerfil() {
        $this->perfil;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    /**
     * Get mensajesReplicados
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMensajesReplicados() {
        return $this->mensajesReplicados;
    }

    public function serialize() {
        return serialize(array(
            'id' => $this->getId(),
            'nick' => $this->getNick(),
            'email' => $this->getEmail(),
            'pass' => $this->getPassword(),
            'perfil' => NULL,
            'avatar' => NULL,
            'Seguidores' => $this->getSeguidores(),
            'Seguidos' => $this->getSeguidos()
        ));
    }

    public function unserialize($strSerialized) {
        $serialized = unserialize($strSerialized);


        $this->id = $serialized['id'];
        $this->nick = $serialized['nick'];
        $this->email = $serialized['email'];
        $this->pass = $serialized['pass'];
        $this->perfil = $serialized['perfil'];
        $this->avatar = $serialized['avatar'];
        $this->Seguidores = $serialized['Seguidores'];
        $this->Seguidos = $serialized['Seguidos'];
    }

    /**
     * Set pass
     *
     * @param string $pass
     */
    public function setPass($pass) {
        $this->pass = $pass;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass() {
        return $this->pass;
    }


    /**
     * Add grupos
     *
     * @param amiguetes\PtuitBundle\Entity\Grupo $grupos
     */
    public function addGrupos(\amiguetes\PtuitBundle\Entity\Grupo $grupos)
    {
        $this->grupos[] = $grupos;
    }

    /**
     * Get grupos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * Add gruposAdministrados
     *
     * @param amiguetes\PtuitBundle\Entity\Grupo $gruposAdministrados
     */
    public function addGruposAdministrados(\amiguetes\PtuitBundle\Entity\Grupo $gruposAdministrados)
    {
        $this->gruposAdministrados[] = $gruposAdministrados;
    }

    /**
     * Get gruposAdministrados
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGruposAdministrados()
    {
        return $this->gruposAdministrados;
    }
}