<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use amiguetes\PtuitBundle\Form\UsuarioType;
use amiguetes\PtuitBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use amiguetes\PtuitBundle\Entity\Perfil;
use amiguetes\PtuitBundle\Entity\Avatar;

class SecurityController extends Controller {

    public function loginAction() {

        return $this->render('PtuitBundle:Security:login.html.twig', array(
            'last_username' => $this->getRequest()->getSession()
                    ->get(SecurityContext::LAST_USERNAME),
            'error' => $this->getRequest()->getSession()
                    ->get(SecurityContext::AUTHENTICATION_ERROR)
        ));
    }

    public function registroAction() {
        
        $usuario=new Usuario();
        $perfil= new Perfil();
        $perfil->setPrivacidad(1);
        $usuario->setPerfil($perfil);
        $avatar=new Avatar();
        $avatar->setCreado(new \DateTime());        
        $usuario->setAvatar($avatar);
        
        $form = $this->get('form.factory')->create(new UsuarioType(),$usuario, 
                array('data_class' => 'amiguetes\PtuitBundle\Entity\Usuario'));
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                // Mensaje para notificar al usuario que todo ha salido bien
                $session = $this->get('request')->getSession();
                $session->setFlash('notice', 'Gracias por registrarte en Ptuit 2011');

                // Obtenemos el usuario
                $usuario = $form->getData();

                // Codificamos el password
                $factory = $this->get('security.encoder_factory');
                $codificador = $factory->getEncoder($usuario);
                $password = $codificador->encodePassword($usuario->getPassword(), $usuario->getSalt());
                $usuario->setPassword($password);

                // Guardamos el objeto en base de datos
                $em = $this->get('doctrine')->getEntityManager();                
                $em->persist($usuario);
                $em->flush();

                // Logueamos al usuario
                //$token = new UsernamePasswordToken($usuario, null, 'main', $usuario->getRoles());
                //$this->get('security.context')->setToken($token);

                return $this->redirect($this->generateUrl('login'));
            }
        }

        return $this->render('PtuitBundle:Security:registro.html.twig', array('form' => $form->createView()));
    }

}