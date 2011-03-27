<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PtuitBundle:Default:index.html.twig');
    }
}
