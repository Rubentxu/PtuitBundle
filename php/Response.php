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
require_once 'lib/IResponse.php';
class Response implements IResponse{

    protected $headers = array();
    protected $data = array();

    public function addHeader($header) {
        $this->headers[] = $header;
    }

    public function setData($key, $value) {
        $this->data[$key] = $value;
    }

    function imprimirRespuesta($datosSalida) {
        try {
            if (isset($datosSalida['pagina'])) {
            if ($datosSalida['pagina'] == "json") {
                header('Cache-Control: no-cache, must-revalidate');
                header('Content-type: application/json; charset=utf-8');

                if (isset($datosSalida['datos'])) {

                    $salida= json_encode($datosSalida['datos']);
                    
                        echo $salida;
                    
                        
                   
                } else {
                    echo "{datos: nohay}";
                }
            } else {
                header('Content-Type: text/html; charset=utf-8');
                $rutapagina = $_SERVER['DOCUMENT_ROOT'] . '/web/' . $datosSalida['pagina'];
                if (isset($datosSalida['datos'])) {
                    $datos = $datosSalida["datos"];
                    echo '<?php  ' . $datos . '  ?>';
                }
                if (file_exists($rutapagina)) {
                    require_once($rutapagina );
                } else {
                    throw new Exception("No se encuentra la pagina a mostrar." . $rutapagina);
                }
            }
        }
        } catch (Exception $exc) {
            if($datosSalida['pagina'] == "json"){
                echo "{datos: error de parseado JSON}";
            }  elseif($datosSalida['pagina'] == "pagina") {
                echo $exc->getTraceAsString();
            }
            
        }


        
    }

}

?>