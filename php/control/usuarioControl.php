<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioControl
 *
 * @author nobel
 */
class usuarioControl {

    private $request;
    private $sesiones;
    private $pService;

    public function __construct(Request $request, ISesion $sesion, IService $service) {
        $this->request = $request;
        $this->sesiones = $sesion;
        $this->pService = $service;
    }

    public function login() {

        if ($this->request->post('usuario') != NULL && $this->request->post('pass') != NULL) {
            $usuario = $this->request->post('usuario');
            $pass = $this->request->post('pass');
            $pass = hash("sha512", $pass);

            $rows = $this->pService->cogerUsuario($usuario, $pass);
            if (sizeof($rows) == 1) {
                if ($rows[0]['usuario'] == $usuario && $rows[0]['pass'] == $pass) {

                    $idUsuario = $rows[0]['idUsuario'];
                    $nick = $rows[0]['usuario'];
                    $email = $rows[0]['email'];
                    $this->sesiones->crearDatosUsuario($idUsuario, $nick, $email);
                    $datos['datosUsuario'] = $this->sesiones->cogerDatosUsuario();

                    return array("pagina" => "json",
                        "datos" => $datos);
                }
            }
            return array("pagina" => "json",
                "datos" => array('msgError' => 'usuario no pudo entrar con estos datos.', "validado" => 'FALSE'));
        } else {
            return array("pagina" => "json",
                "datos" => array('msgError' => 'Los datos del usuario no se recibieron.', "validado" => 'FALSE'));
        }
    }

    public function crearUsuario() {

        $usuario = $this->request->post('usuario');
        $pass = $this->request->post('pass');
        $pass = hash("sha512", $pass);
        $correo = $this->request->post('correo');
        try {
            $rows = $this->cogerUsuario();
            if (sizeof($rows) > 0) {
                return array("pagina" => "json",
                    "datos" => 'usuario ya esta cogido, escoge otro.');
            } else {
                $this->pService->crearUsuario($usuario, $pass, $correo);

                return array("pagina" => "json",
                    "datos" => 'usuario creado');
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    private function cogerUsuario() {

        $usuario = $this->request->post('usuario');
        $pass = $this->request->post('pass');

        $pass = hash("sha512", $pass);
        return $rows[] = $this->pService->cogerUsuario($usuario, $pass);
    }

}

?>
