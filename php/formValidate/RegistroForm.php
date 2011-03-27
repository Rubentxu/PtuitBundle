<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistroForm
 *
 * @author rubentxu
 */
class RegistroForm {

    public function validar($request) {
        $usuario = $request->post('usuario');
        $pass = $request->post('pass');
        $pass2 = $request->post('pass2');
        $correo = $request->post('correo');
        $usuario = trim($usuario);

        $msgError = "";
        if (filter_var($usuario, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9_]{3,16}$/"))) === false) {
            $msgError = "El usuario debe tener entre 3 y 16 caracteres alfanumericos.";
            return array("pagina" => "json",
                "datos" => array('msgError' => $msgError, "validado" => 'FALSE'));
        }
        if (filter_var($pass, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s0-9]{6,20}$/"))) === false) {
            $msgError .= "El password debe tener entre 6 y 20 caracteres alfanumericos.";
            return array("pagina" => "json",
                "datos" => array('msgError' => $msgError, "validado" => 'FALSE'));
        }
        if ($pass != $pass2) {
            $msgError = "Los 2 entradas de password deben ser iguales.";
            return array("pagina" => "json",
                "datos" => array('msgError' => $msgError, "validado" => 'FALSE'));
        }
        if (filter_var($correo, FILTER_VALIDATE_EMAIL) === FALSE) {
            $msgError = "La entrada de correo no es una direccion email valida.";
            return array("pagina" => "json",
                "datos" => array('msgError' => $msgError, "validado" => 'FALSE'));
        }

        return array("datos" => array('msgError' => FALSE, "validado" => 'TRUE'));
    }

}

?>
