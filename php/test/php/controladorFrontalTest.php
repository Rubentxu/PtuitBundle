<?php

require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../controladorFrontal.php';
require_once 'Contenedor.php';
require_once 'Sesiones.php';

class controladorFrontalTest extends PHPUnit_Framework_TestCase {

    private $cf;
    private $Contenedor;

    protected function setUp() {
        $this->Contenedor = $this->getMock('Contenedor', array('get', 'server', 'post', 'sesion'));
        $this->Contenedor->expects($this->any())
                ->method('sesion')
                ->will($this->returnValue('foo'));

        $this->cf = new controladorFrontal($this->Contenedor);
    }

    public function expectativasServer() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'DOCUMENT_ROOT':
                return $_SERVER['DOCUMENT_ROOT'];

                break;
            case 'REQUEST_METHOD':
                return 'GET';
            default:
                break;
        }
    }

    public function expectativasGet() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return 'prueba';

                break;
            case 'accion':
                return 'pruebaIndex';
            default:
                break;
        }
    }

    public function testComprobarPeticionGet() {
        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServer')));
        $this->Contenedor->expects($this->any())
                ->method('get')
                ->will($this->returnCallback(array($this, 'expectativasGet')));
        $this->Contenedor->expects($this->any())
                ->method('sesion')
                ->will($this->returnValue(TRUE));

        $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        $this->assertEquals('prueba', $mapeo['controlador']);
        $this->assertEquals('pruebaIndex', $mapeo['accion']);
    }

    public function expectativasGetNula() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return NULL;

                break;
            case 'accion':
                return NULL;
            default:
                break;
        }
    }

    public function testComprobarPeticionGetNula() {
        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServer')));
        $this->Contenedor->expects($this->any())
                ->method('get')
                ->will($this->returnCallback(array($this, 'expectativasGetNula')));
        $this->Contenedor->expects($this->any())
                ->method('sesion')
                ->will($this->returnValue(TRUE));

        $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        $this->assertEquals('index', $mapeo['controlador']);
        $this->assertEquals('index', $mapeo['accion']);
    }

    public function expectativasGetVacio() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return '';

                break;
            case 'accion':
                return '';
            default:
                break;
        }
    }

    public function testComprobarPeticionGetVacio() {
        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServer')));
        $this->Contenedor->expects($this->any())
                ->method('get')
                ->will($this->returnCallback(array($this, 'expectativasGetVacio')));

        $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        $this->assertEquals('index', $mapeo['controlador']);
        $this->assertEquals('index', $mapeo['accion']);
    }

    public function expectativasGetconExpresionRegularIncorrecta() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return 'as1234ºas';

                break;
            case 'accion':
                return 'as1234ºas';
            default:
                break;
        }
    }

    public function testComprobarPeticionGetconExpresionRegularIncorrecta() {
        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServer')));
        $this->Contenedor->expects($this->any())
                ->method('get')
                ->will($this->returnCallback(array($this, 'expectativasGetconExpresionRegularIncorrecta')));

        $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        $this->assertEquals('index', $mapeo['controlador']);
        $this->assertEquals('index', $mapeo['accion']);
    }

    public function expectativasGetconExpresionRegularCorrecta() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return 'regularExControl';

                break;
            case 'accion':
                return 'regularExAccion';
            default:
                break;
        }
    }

    public function testComprobarPeticionGetconExpresionRegularCorrecta() {
        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServer')));
        $this->Contenedor->expects($this->any())
                ->method('get')
                ->will($this->returnCallback(array($this, 'expectativasGetconExpresionRegularCorrecta')));

        $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        $this->assertEquals('regularExControl', $mapeo['controlador']);
        $this->assertEquals('regularExAccion', $mapeo['accion']);
    }

    public function expectativasServerPost() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'DOCUMENT_ROOT':
                return $_SERVER['DOCUMENT_ROOT'];

                break;
            case 'REQUEST_METHOD':
                return 'POST';
            default:
                break;
        }
    }

    public function expectativasPost() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return 'prueba';

                break;
            case 'accion':
                return 'pruebaIndex';
            default:
                break;
        }
    }

    public function testComprobarPeticionPost() {
        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServerPost')));
        $this->Contenedor->expects($this->any())
                ->method('post')
                ->will($this->returnCallback(array($this, 'expectativasPost')));

        $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        $this->assertEquals('prueba', $mapeo['controlador']);
        $this->assertEquals('pruebaIndex', $mapeo['accion']);
    }

    public function expectativasPostNulo() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return NULL;

                break;
            case 'accion':
                return NULL;
            default:
                break;
        }
    }

    public function testComprobarPeticionPostNulo() {

        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServerPost')));
        $this->Contenedor->expects($this->any())
                ->method('post')
                ->will($this->returnCallback(array($this, 'expectativasPostNulo')));
        try {
            $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        } catch (Exception $exc) {
            return;
        }

        $this->fail('Una excepcion no ha sido recogida');
    }

    public function expectativasPostVacio() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'controlador':
                return '';

                break;
            case 'accion':
                return '';
            default:
                break;
        }
    }

    public function testComprobarPeticionPostVacio() {

        $this->Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServerPost')));
        $this->Contenedor->expects($this->any())
                ->method('post')
                ->will($this->returnCallback(array($this, 'expectativasPostVacio')));
        try {
            $mapeo = $this->cf->comprobarPeticion($this->Contenedor);
        } catch (Exception $exc) {
            return;
        }

        $this->fail('Una excepcion no ha sido recogida');
    }

    public function expectativasServerEjecutarAccion() {
        $args = func_get_args();
        switch ($args[0]) {
            case 'DOCUMENT_ROOT':
                return '/';

                break;
            case 'REQUEST_METHOD':
                return 'GET';
            default:
                break;
        }
    }

    public function testEjecutarAccion() {
        $Contenedor = $this->getMock('Contenedor', array('get', 'server', 'post'));
        $Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServerEjecutarAccion')));
        $sesion = $this->getMock('Sesiones');
        $cf = new controladorFrontal($Contenedor, $sesion);
        $config = parse_ini_file("config/configTest.ini", true);
        define('RUTA_CLASES', __DIR__.'/clases/');
        




        $mapeo = array('controlador' => 'pruebas', 'accion' => 'pruebaAccion');
        $datosSalida = $cf->ejecutarAccion($mapeo);

        $this->assertEquals('prueba.php', $datosSalida['pagina']);
        $this->assertEquals('pruebaDatos', $datosSalida['datos']);
    }

    public function testEjecutarAccionMapeoControladorNulo() {
        $Contenedor = $this->getMock('Contenedor', array('get', 'server', 'post'));
        $Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServerEjecutarAccion')));
        $sesion = $this->getMock('Sesiones');
        $cf = new controladorFrontal($Contenedor, $sesion);
        $mapeo = array('controlador' => NULL, 'accion' => 'pruebaAccion');
        try {
            $datosSalida = $cf->ejecutarAccion($mapeo);
        } catch (Exception $exc) {
            return;
        }
        $this->fail('Una excepcion no ha sido recogida');
    }
       public function testEjecutarAccionMapeoControladorVacio() {
        $Contenedor = $this->getMock('Contenedor', array('get', 'server', 'post'));
        $Contenedor->expects($this->any())
                ->method('server')
                ->will($this->returnCallback(array($this, 'expectativasServerEjecutarAccion')));
        $sesion = $this->getMock('Sesiones');
        $cf = new controladorFrontal($Contenedor, $sesion);
        $mapeo = array('controlador' => '', 'accion' => 'pruebaAccion');
        try {
            $datosSalida = $cf->ejecutarAccion($mapeo);
        } catch (Exception $exc) {
            return;
        }
        $this->fail('Una excepcion no ha sido recogida');
    }

}

?>
