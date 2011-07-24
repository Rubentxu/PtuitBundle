<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use amiguetes\PtuitBundle\Entity\Mensaje;
use amiguetes\PtuitBundle\Form\MensajeType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Mensaje controller.
 *
 * @Route("/ptuit")
 */
class MensajeController extends Controller {

    /**
     * Lists all Mensaje entities.
     *
     * @Route("/", name="ptuit")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('PtuitBundle:Mensaje')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Mensaje entity.
     *
     * @Route("/{id}/show", name="ptuit_show")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('PtuitBundle:Mensaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mensaje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Mensaje entity.
     *
     * @Route("/new", name="ptuit_new")
     * @Template()
     */
    public function newAction() {
        $entity = new Mensaje();
        $form = $this->createForm(new MensajeType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView()
        );
    }

    /**
     * Creates a new Mensaje entity.
     *
     * @Route("/create", name="ptuit_create")
     * @Method("post")
     * @Template("PtuitBundle:Mensaje:new.html.twig")
     */
    public function createAction() {
        $mensaje = new Mensaje();
        $request = $this->getRequest();
        $texto=$request->get('texto');
        $mensaje->setTexto($texto);
        $mensaje->setNombreusuario("rubentxu");
        $formulario = $this->createForm(new MensajeType(), $mensaje, 
                array('data'=> array() ));
        
        

        if ('POST' === $request->getMethod()) {
            $formulario->bindRequest($request);

            if ($formulario->isValid()) {
                // realiza alguna acción, tal como guardar el objeto en la base de datos
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($mensaje);
                $em->flush();
                $response = new Response(json_encode(array('texto'=>$mensaje->getTexto(), 'usuario'=>$mensaje
                        ->getNombreusuario(),'fecha'=>$mensaje->getCreado())));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }

            return array(
                'entity' => $mensaje,
                'form' => $formulario->createView()
            );
        }
    }

    /**
     * Displays a form to edit an existing Mensaje entity.
     *
     * @Route("/{id}/edit", name="ptuit_edit")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('PtuitBundle:Mensaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mensaje entity.');
        }

        $editForm = $this->createForm(new MensajeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Mensaje entity.
     *
     * @Route("/{id}/update", name="ptuit_update")
     * @Method("post")
     * @Template("PtuitBundle:Mensaje:edit.html.twig")
     */
    public function updateAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('PtuitBundle:Mensaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mensaje entity.');
        }

        $editForm = $this->createForm(new MensajeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('ptuit_edit', array('id' => $id)));
            }
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Mensaje entity.
     *
     * @Route("/{id}/delete", name="ptuit_delete")
     * @Method("post")
     */
    public function deleteAction($id) {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $entity = $em->getRepository('PtuitBundle:Mensaje')->find($id);

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Mensaje entity.');
                }

                $em->remove($entity);
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('ptuit'));
    }

    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                ->add('id', 'hidden')
                ->getForm()
        ;
    }

}
