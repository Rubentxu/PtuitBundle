<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioController extends Controller {

    public function indexAction() {

        $id = 1;


        $dql = "SELECT  m  FROM PtuitBundle:Mensaje  m, PtuitBundle:Usuario u 
            JOIN u.Seguidores s 
            WHERE s.id =1 
            AND m.usuario=u.id 
            OR m.usuario=1 
            GROUP BY m.texto 
            ORDER BY m.creado DESC";

        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->createQuery($dql)
                ->getResult();
     

        return $this->render('PtuitBundle:Inicio:index.html.twig', array('entities' => $entities));
    }

}
