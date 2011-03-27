<?php

interface ISesion {
    public function crearDatosUsuario($idUsuario, $nick, $email);

    public function existeDatosUsuario();

    public function cogerDatosUsuario();

    public function borrarSesion();

    public function get($valor);

    public function set($dato, $valor);
}

?>
