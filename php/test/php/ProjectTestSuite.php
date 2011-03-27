<?php

require_once 'TestAll.php';

class ProjectTestSuite {

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite('ProjectTestSuite');
        $suite->addTest(TestAll::suite());
        //other package ...

        return $suite;
    }

}

?>
