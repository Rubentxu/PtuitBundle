<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginForm
 *
 * @author rubentxu
 */
class LoginForm {

    public function validar($request) {
        $usuario = $request->post('usuario');
        $pass = $request->post('pass');

        $usuario = trim($usuario);
        
        $msgError="";
        if (filter_var($usuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9_]{3,16}$/"))) === false) {
            $msgError = "El usuario debe tener entre 3 y 16 caracteres alfanumericos.";
            return array("pagina" => "json",
                "datos" => array('msgError' => $msgError, "validado" => 'FALSE'));
        }
        if (filter_var($pass, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s0-9]{6,20}$/"))) === false) {
            $msgError .= "El password debe tener entre 6 y 20 caracteres alfanumericos.";
            return array("pagina" => "json",
                "datos" => array('msgError' => $msgError, "validado" => 'FALSE'));
        }

        return array("datos" => array('msgError' => FALSE, "validado" => 'TRUE'));
    }

}

?>
