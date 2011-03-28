<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaMensajeForm
 *
 * @author rubentxu
 */
class CajaMensajeForm {

    public function validar($request) {

        $mensaje = $request->post('txtMen');

        

        if (strlen($mensaje) > 160 || strlen($mensaje) < 1 || $mensaje==NULL || $mensaje=='') {

            $msgError = "El mensaje debe contener al menos un caracter y no exceder de 160 caracteres.";
            return array("pagina" => "json",
                "datos" => array('msgError' => $msgError, "validado" => 'FALSE'));
        }
        
        return array("datos" => array('msgError' => FALSE, "validado" => 'TRUE'));
    }

}

?>
