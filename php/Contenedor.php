<?php

class Contenedor {

    private $request;
    private $response;
    private $sesion;
    private $config;
    private $service;
    private $configArray;
    private $dbName;
    private $dbUser;
    private $dbPass;

    public function iniciar() {
        try {
            if (empty($this->config)) {
                $this->configArray = parse_ini_file("config/config.ini", true);
            } else {
                $this->configArray = parse_ini_file($this->config, true);
            }
            $require = $this->configArray['REQUIRE']['requerido'];
            foreach ($require as $value) {
                require_once ( $value);
            }

            if (empty($this->request)) {
                $this->request = new Request(
                                $_SERVER, $_GET,
                                $_POST,
                                $_COOKIE, $_FILES, $_ENV
                );
            }
            if (empty($this->response)) {
                $this->setResponse(new Response());
            }
            if (empty($this->sesion)) {
                $this->setSesion(new Sesiones());
            }
            $this->configurar();
            if (empty($this->service)) {
                $this->setService(new ServiceMySql($this->dbName,
                                        $this->dbUser, $this->dbPass));
            }

            $cf = new controladorFrontal($this->request, $this->sesion, $this->service);
            $Salida = $cf->arranca();
            $this->response->imprimirRespuesta($Salida);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    private function configurar() {
        $bdConfig = $this->configArray['BBDD'];
        $this->dbName = $bdConfig['DB_NAME'];
        $this->dbUser = $bdConfig['DB_USER'];
        $this->dbPass = $bdConfig['DB_PASS'];
        $rutasConfig = $this->configArray['RUTAS'];
        define('RUTA_CLASES', $this->request->server('DOCUMENT_ROOT') . $rutasConfig['rutaClases']);
        define('RUTA_PAGINAS', $this->request->server('DOCUMENT_ROOT') . $rutasConfig['rutaPaginas']);
        define('RUTA_CONTROL_F', $this->request->server('DOCUMENT_ROOT') . $rutasConfig['rutaControlF']);
        define('RUTA_FORM', $this->request->server('DOCUMENT_ROOT') . $rutasConfig['rutaFormulario']);
    }

    public function getRequest() {
        return $this->request;
    }

    public function setRequest($request) {
        $this->request = $request;
    }

    public function getResponse() {
        return $this->response;
    }

    public function setResponse(IResponse $response) {
        $this->response = $response;
    }

    public function getSesion() {
        return $this->sesion;
    }

    public function setSesion(ISesion $sesion) {
        $this->sesion = $sesion;
    }

    public function getConfig() {
        return $this->config;
    }

    public function setConfig($config) {
        $this->config = $config;
    }

    public function getService() {
        return $this->service;
    }

    public function setService(IService $service) {
        $this->service = $service;
    }

}

?>
