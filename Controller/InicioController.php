<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use amiguetes\PtuitBundle\Entity\Mensaje;

class InicioController extends Controller {

    public function indexAction() {

        $usuario = $this->get('security.context')->getToken()->getUser();

        $mensaje = new Mensaje();
        $formulario = $this->createFormBuilder($mensaje)
                ->add('texto', 'textarea')
                ->getForm();

        $id = $usuario->getId();

        $em = $this->getDoctrine()->getEntityManager();
        $mensajes = $em->getRepository('PtuitBundle:Mensaje')
                ->findCronologia($id);

        $usuario = $em->getRepository('PtuitBundle:Usuario')
                ->find($id);



        return $this->render('PtuitBundle:Inicio:index.html.twig', array('mensajes' => $mensajes,
            'usuario' => $usuario,
            'form' => $formulario->createView()));
    }

}
