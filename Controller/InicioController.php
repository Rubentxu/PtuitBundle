<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use amiguetes\PtuitBundle\Entity\Mensaje;

class InicioController extends Controller {

    public function indexAction() {

        $mensaje = new Mensaje();
        $formulario = $this->createFormBuilder($mensaje)
                ->add('texto', 'textarea')
                ->getForm();


        $id = 1;

        $em = $this->getDoctrine()->getEntityManager();
        $mensajes = $em->getRepository('PtuitBundle:Mensaje')
                ->findCronologia($id);



        return $this->render('PtuitBundle:Inicio:index.html.twig', 
                array('mensajes' => $mensajes,'form' => $formulario->createView()));
    }

}
