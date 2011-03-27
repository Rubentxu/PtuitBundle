<?php

namespace amiguetes\PtuitBundle\Entity;

/**
 * amiguetes\PtuitBundle\Entity\Usuario
 */
class Usuario
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nick
     */
    private $nick;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var string $pass
     */
    private $pass;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $telefono
     */
    private $telefono;

    /**
     * @var integer $edad
     */
    private $edad;

    /**
     * @var text $intereses
     */
    private $intereses;

    /**
     * @var text $bio
     */
    private $bio;

    /**
     * @var string $localizacion
     */
    private $localizacion;

    /**
     * @var string $www
     */
    private $www;

    /**
     * @var string $avatar
     */
    private $avatar;


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
     * @return string $nick
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
     * @return string $nombre
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
     * @return string $pass
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
     * @return string $email
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
     * @return string $telefono
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
     * @return integer $edad
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
     * @return text $intereses
     */
    public function getIntereses()
    {
        return $this->intereses;
    }

    /**
     * Set bio
     *
     * @param text $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * Get bio
     *
     * @return text $bio
     */
    public function getBio()
    {
        return $this->bio;
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
     * @return string $localizacion
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * Set www
     *
     * @param string $www
     */
    public function setWww($www)
    {
        $this->www = $www;
    }

    /**
     * Get www
     *
     * @return string $www
     */
    public function getWww()
    {
        return $this->www;
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
     * @return string $avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}