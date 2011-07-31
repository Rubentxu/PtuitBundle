<?php

namespace amiguetes\PtuitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * amiguetes\PtuitBundle\Entity\Mensaje
 * 
 * @ORM\Table(name="Mensaje")
 * @ORM\Entity(repositoryClass="amiguetes\PtuitBundle\Repository\MensajeRepository")
 */
class Mensaje {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
  
    /**
     * @var datetime $fecha     
     * @ORM\Column(name="creado", type="datetime", nullable=true)
     * @Assert\Type(type="\DateTime")
     */
    private $creado;
    /**
     * @var datetime $modificado
     *
     * @ORM\Column(name="modificado", type="datetime", nullable=true)
     * @Assert\Type(type="\DateTime")
     */
    private $modificado;
    /**
     * @var string $texto
     *
     * @ORM\Column(name="texto", type="string", length=160, nullable=true)
     * @Assert\NotBlank( message = "Por favor, escriba algo")
     * @Assert\MinLength(limit=2 , message = "Por favor,escriba al menos 2 caracteres")
     * @Assert\MaxLength(limit=160, message = "Por favor,no exceda de los 160 caracteres")
     */
    private $texto;
    /**     
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="mensajesReplicados")
     * @ORM\JoinTable(name="Mensajes_replicados_por_Usuarios",
     *      joinColumns={@ORM\JoinColumn(name="usuario_que_replica", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="mensaje_replicado", referencedColumnName="id")}
     *      )
     */
    private $replicadoPorUsuario;
    /**
     * @var Usuario
     *
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="mensajesFavoritos")
     * @ORM\JoinTable(name="Mensaje_favorito",
     *   joinColumns={@ORM\JoinColumn(name="mensajeId", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="usuarioId", referencedColumnName="id")
     *   })
     */
    private $usuarioDeFavoritos;
    /**
     * @var Tag
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="mensajeid")
     * @ORM\JoinTable(name="Mensaje_tag",
     *   joinColumns={@ORM\JoinColumn(name="mensajeId", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="tagId", referencedColumnName="id")
     *   })
     */
    private $tagid;
    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")     
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")})
     * @Assert\NotNull
     */
    private $usuario;



    public function __construct() {
        $this->usuario = new ArrayCollection();
        $this->tagid = new ArrayCollection();
        $this->replicadoPorUsuario = new ArrayCollection();
        $this->usuarioDeFavoritos= new ArrayCollection();
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
     * Set creado
     *
     * @param datetime $creado
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
    }

    /**
     * Get creado
     *
     * @return datetime 
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set modificado
     *
     * @param datetime $modificado
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    }

    /**
     * Get modificado
     *
     * @return datetime 
     */
    public function getModificado()
    {
        return $this->modificado;
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
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Add replicadoPorUsuario
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $replicadoPorUsuario
     */
    public function addReplicadoPorUsuario(\amiguetes\PtuitBundle\Entity\Usuario $replicadoPorUsuario)
    {
        $this->replicadoPorUsuario[] = $replicadoPorUsuario;
    }

    /**
     * Get replicadoPorUsuario
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getReplicadoPorUsuario()
    {
        return $this->replicadoPorUsuario;
    }

    /**
     * Add usuarioid
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $usuarioid
     */
    public function addUsuarioDeFavoritos(\amiguetes\PtuitBundle\Entity\Usuario $usuario)
    {
        $this->usuarioDeFavoritos[] = $usuario;
    }

    /**
     * Get usuarioid
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsuarioDeFavoritos()
    {
        return $this->usuarioDeFavoritos;
    }

    /**
     * Add tagid
     *
     * @param amiguetes\PtuitBundle\Entity\Tag $tagid
     */
    public function addTagid(\amiguetes\PtuitBundle\Entity\Tag $tagid)
    {
        $this->tagid[] = $tagid;
    }

    /**
     * Get tagid
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTagid()
    {
        return $this->tagid;
    }

    /**
     * Set usuario
     *
     * @param amiguetes\PtuitBundle\Entity\Usuario $usuario
     */
    public function setUsuario(\amiguetes\PtuitBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return amiguetes\PtuitBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}