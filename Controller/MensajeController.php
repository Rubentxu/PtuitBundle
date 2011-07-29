<?php

namespace amiguetes\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use amiguetes\PtuitBundle\Entity\Mensaje;
use amiguetes\PtuitBundle\Form\MensajeType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolation;

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
     * @Template("PtuitBundle:Ajax:respuestaMensaje.json.twig")
     */
    public function createAction() {

        $usuario = $this->get('security.context')->getToken()->getUser();
        $mensaje = new Mensaje();
        $request = $this->getRequest();
        $mensaje->setTexto($request->get('texto'));
        $mensaje->setUsuario($usuario);
        $mensaje->setCreado(new \DateTime());
        $mensaje->setModificado(new \DateTime());

        $validador = $this->get('validator');
        $listaErrores = $validador->validate($mensaje);




// TODO Implementar recogida de tags en el texto palabras que empiecen por #
        //$mensaje->addTagid($tagid);

        if ('POST' === $request->getMethod()) {

            if (count($listaErrores) > 0) {
                $res = array();
                foreach ($listaErrores as  $value) {
                    $res[] = $value->getMessage();
                }
                $response = new Response(json_encode($res));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            } else {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($mensaje);
                $em->flush();
                
                return array('mensaje'=>$mensaje);
            }
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
