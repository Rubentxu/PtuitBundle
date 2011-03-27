<?php
# ptuit
#
# This file is part of ptuit.
#
# ptuit is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# ptuit is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with ptuit. If not, see <http://www.gnu.org/licenses/>.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">


    <head>
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="expires" content="-1" />

        <title>Ptuit </title>
        <link rel="stylesheet" href="/web/css/style.css" type="text/css"/>
        <script type="text/javascript" src="/web/js/jquery.js"></script>
        <script type="text/javascript" src="/web/js/ptuit.js"></script>

    </head>

    <body >
        <div id="panel">
            <form action="#" method="post" >
                <p><em>Escribe tu nick y password</em></p>
                <label class="label" for="nick">Nombre/Nick:</label> <input id="nick" class="campo" title="nick" type="text"></input>
                <label class="label" for="pass">Password:</label> <input id="pass"class="campo" title="pass" type="password"></input>
                <label class="label" for="cat">Catcha:</label> <input id="cat"class="campo" title="cat" type="text"></input>


                <p><input id="btnLogin" title="btnlogin" name="login" value="login" type="button"/></p>
                <div class="error" id="errorFormLogin"></div>

            </form>
        </div>
        <div id="panel2">
            <form action="#" method="post">
                <p><em>Entra tus datos para registrarte</em></p>
                <label class="label" for="nick">Nombre/Nick:</label> <input id="nickR" class="campo" title="nick" type="text"></input>
                <label class="label" for="pass">Password:</label> <input id="passR"class="campo" title="pass" type="password"></input>
                <label class="label" for="pass2">Repite Password:</label> <input id="passR2"class="campo" title="pass2" type="password"></input>
                <label class="label" for="correo">Email:</label> <input id="correo"class="campo" title="correo" type="text"></input>

                <p><input id="btnRegistrar" title="registrar" name="registrar" value="registrar" type="button"/></p>
                <div class="error" id="errorFormRegistro"></div>

            </form>
        </div>
        <div id="marcoIzq">

            <?php
            if (isset($datos['datosCategorias'])) {
                $datosC = $datos['datosCategorias'];
                echo "<span>CATEGORIAS______________|________________TAGS</span>";
                echo '<ul id="mar" class="marquee">';
                for ($i = 0, $datosC, $a = count($datosC); $i < $a; $i++) {
                    echo "<li class='categorias'><em style='color:red;'>" . $datosC[$i]['categoria'] . " :</em> " . $datosC[$i]['rutaCat'] . "</li>";
                }
                echo '</ul>';
            }
            ?>
        </div>
        <div id="header">
            <img src="/web/imagen/logo.png" alt="ptuit" />
            <?php
            if (isset($datos['datosUsuario'])) {
                
                echo '<a  href="#">Bienvenido: ' . $datos['datosUsuario']['usuario'] . '</a>';
            } else {
                echo '<a id="registro" href="#">Registrarse</a><a id="login" href="#">Login</a>
            <div id="logExito"></div>';
            } ?>

        </div>

        <div id="content">
            <div id="marco">

                <div id="cajaMensaje">
                    <form action="#" method="post">
                        <fieldset >
                            <legend>Escribe tu ptuit</legend>

                            <textarea class="txtMen" name="mensaje" title="mensaje" cols="63" rows="2" ></textarea>
                            <div class="error" id="errorMensaje"></div>
                            <div class="contador" ></div>
                            <input id="botonTxt" title="enviar" name="ptuit" value="ptuit.." type="button"/>

                        </fieldset>
                    </form>
                </div>
                <div id="caja_men" >
                    <?php
                    
                    if (isset($datos['datosMensajes'])) {
                        $datosM = $datos['datosMensajes'];
                        for ($i = 0, $datosM, $a = count($datosM); $i < $a; $i++) {
                            echo "<div class='ptuits'><img class='avatar' label='ptuit' src='/web/imagen/ptuit.png'></img>
                                <span class='avatarTxt'> <em style='color:blue;'>" . $datosM[$i]['usuario'] . " :</em> " . $datosM[$i]['texto'] . "</span><span style='color:#FFF;float: right;'>" . $datosM[$i]['mod'] . "</span></div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div id="footer">
            <div id="cc">Ptuit 2011 </div>
        </div>
    </body>

</html>
