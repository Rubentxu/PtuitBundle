<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller {

    public function loginAction() {

        return $this->render('PtuitBundle:Security:login.html.twig', array(
            'last_username' => $this->getRequest()->getSession()
                    ->get(SecurityContext::LAST_USERNAME),
            'error' => $this->getRequest()->getSession()
                    ->get(SecurityContext::AUTHENTICATION_ERROR)
        ));
    }

}