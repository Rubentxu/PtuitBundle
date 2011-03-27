<?php

require_once 'controladorFrontalTest.php';
require_once 'control/usuarioControlTest.php';

//other include ...

class TestAll {

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite('TestAll');
        $suite->addTestSuite('controladorFrontalTest');
        $suite->addTestSuite('usuarioControlTest');
        //other formPackage test-class ...

        return $suite;
    }

}

?>
