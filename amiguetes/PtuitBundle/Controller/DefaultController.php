<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use amiguetes\PtuitBundle\Entity;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $datos['datosMensajes'] = $em->getRepository("amiguetes\PtuitBundle\Entity\Mensaje")->findAll();
        



        return $this->render('PtuitBundle:Default:index.html.php', array('datos' => $datos));
    }
}
