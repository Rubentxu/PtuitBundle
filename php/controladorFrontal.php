<?php

/*
  Copyright (C) <2011>  <rubentxu>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU Affero General Public License as
  published by the Free Software Foundation, either version 3 of the
  License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details.

  You should have received a copy of the GNU Affero General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

 */

/**
 * @mainpage ControladorFrontal
 * Descripcion de controladorFrontal:
 * Coge parametros controlador y accion del request de la pagina para mapear y redirigir las peticiones.
 * Se comprueba que existe el fichero /clases/.$controlador.php y si existe se incluye en el controlador Frontal para luego
 * llamar a la accion ($controlador->$accion).
 * Este metodo debe devolver una variable llamada $datosSalida que es un array donde se incluira el dato "pagina" que es una variable
 * que indica el nombre de la pagina a mostrar.
 * Los datos iran dentro de $datosSalida['datos'] que es otro array con datos para la pagina.
 * 
 *
 * @author rubentxu
 * @
 */

class controladorFrontal {

    private $controlador;
    private $accion;
    private $usuario;
    private $sesion;
    private $request;
    private $service;

    public function __construct($request,  ISesion $sesion,  IService $service) {
        $this->service=$service;
        $this->request=$request;
        $this->sesion=$sesion;
        $this->controlador = "index";
        $this->accion = "index";
        $this->usuario = "anonimo";
    }

  

    function arranca() {

        try {
            
            $mapeoPeticion = $this->comprobarPeticion($this->request);
            if (isset($mapeoPeticion['validar']) && ($mapeoPeticion['validar'])) {
                $formulario = $this->request->post('formulario');
                $formulario = $formulario . 'Form';
                require_once RUTA_FORM . $formulario . '.php';

                if (class_exists($formulario, false)) {
                    $fm = new $formulario();
                } else {
                    throw new Exception("No carga el Formulario:   $formulario en ruta " . RUTA_FORM);
                }
                if (method_exists($fm, 'validar')) {

                    $datosValidacion = $fm->validar($this->request);
                    if ($datosValidacion['datos']['validado']=='FALSE') {
                        return $datosValidacion;
                    }
                } else {
                    throw new Exception("No se encuentra validar: en Formulario $formulario en la ruta " . RUTA_FORM);
                }
            }

            return $this->ejecutarAccion($mapeoPeticion);
        } catch (Exception $exc) {
            throw new Exception("Fallo en Controlador Frontal--- " . $exc->getMessage());
        }
    }

    function comprobarPeticion($request) {

        try {
            if ($request->server('REQUEST_METHOD') == 'GET') {
                if ($request->get('controlador') == NULL || $request->get('accion') == NULL
                        || $request->get('controlador') == "" || $request->get('accion') == "") {

                    $controlador = 'index';
                    $accion = 'index';
                    return array("controlador" => $controlador, "accion" => $accion);
                }
                if (preg_match("/^[a-zA-Z]+$/", $ctr->get('controlador')) ||
                        preg_match("/^[a-zA-Z]+$/", $ctr->get('controlador'))) {

                    $controlador = $request->get('controlador');
                    $accion = $request->get('accion');
                    return array("controlador" => $controlador, "accion" => $accion);
                }
            } elseif ($request->server('REQUEST_METHOD') == 'POST') {
                if ($request->post('controlador') == NULL || $request->post('accion') == NULL
                        || $request->post('controlador') == "" || $request->post('accion') == "") {
                    throw new Exception("No se encuentra datos de mapeo del POST.");
                }
                if (preg_match("/^[a-zA-Z]+$/", $request->post('controlador')) ||
                        preg_match("/^[a-zA-Z]+$/", $request->post('controlador'))) {

                    $controlador = $request->post('controlador');
                    $accion = $request->post('accion');
                    return array("controlador" => $controlador, "accion" => $accion, "validar" => TRUE);
                }
            }
            $controlador = 'index';
            $accion = 'index';
            return array("controlador" => $controlador, "accion" => $accion);
        } catch (Exception $exc) {
            throw new Exception("Fallo...Comprobando Peticion :" . $exc->getMessage());
        }
    }

    function ejecutarAccion($mapeo) {
        if (!isset($mapeo['controlador']) || $mapeo['controlador'] == '') {
            throw new Exception("No se encuentra el mapeo " . $mapeo['controlador']);
        }
        $controlador = $mapeo['controlador'] . 'Control';
        $accion = $mapeo['accion'];

        $rutaControlador = RUTA_CLASES . $controlador . '.php';

        if (file_exists($rutaControlador)) {
            require_once( $rutaControlador );
        } else {
            throw new Exception("No se encuentra el controlador $controlador en ruta $rutaControlador:: rutaClases: " . RUTA_CLASES . " ");
        }

        if (class_exists($controlador, false)) {
            $cont = new $controlador($this->request,$this->sesion,$this->service);
        } else {
            throw new Exception("No carga el Controlador:   $controlador en ruta $rutaControlador");
        }

        if (method_exists($cont, $accion)) {

            return  $cont->$accion();
        } else {
            throw new Exception("No se encuentra la accion: $accion en controlador $controlador en la ruta $rutaControlador");
        }
    }

 
}

?>