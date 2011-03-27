<?php

/**
 * @class Sesiones
 */
require_once 'ISesion.php';
class Sesiones implements ISesion{

    public function __construct() {
        session_start();
    }

    /*     * Se crea la sesion del usuario logueado.
      @param[in] $id Se recibe como parametro el identificador del usuario y se guarda en la sesion.
     */

    public function crearDatosUsuario($idUsuario, $nick, $email) {

        $_SESSION['datosUsuario'] = array('idUsuario' => $idUsuario, 'usuario' => $nick, 'email' => $email);
    }

    /*     * Se comprueba si existe la sesion de algun usuario.
      @return true si existe la sesion de algun usuario.
      @return false si no existe la sesion de ningun usuario.
     */

    public function existeDatosUsuario() {

        if (isset($_SESSION['datosUsuario'])) {
            return true;
        } else {
            return false;
        }
    }

    public function cogerDatosUsuario() {
        if ($this->existeDatosUsuario()) {
            return $_SESSION['datosUsuario'];
        } else {
            return FALSE;
        }
    }

    /*     * Se borra la sesion del usuario. */

    public function borrarSesion() {
        $_SESSION = array();
        session_destroy();
    }

    public function get($valor) {
        return $_SESSION[$valor];
    }

    public function set($dato, $valor) {
        return $_SESSION[$dato] = $valor;
    }

}

?>