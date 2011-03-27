<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pruebasControl
 *
 * @author rubentxu
 */
class pruebasControl {
    public function __construct(Contenedor $ctr) {}
    public function pruebaAccion(){
        return array("pagina" => "prueba.php",
                "datos" => 'pruebaDatos');
    }
}
?>
