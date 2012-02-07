<?php

namespace HotDesign\SimpleAgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HotDesign\SimpleAgendaBundle\Entity\Circle;
use HotDesign\SimpleAgendaBundle\Form\CircleType;

/**
 * Circle controller.
 *
 */
class CircleController extends Controller
{
    /**
     * Lists all Circle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('SimpleAgendaBundle:Circle')->findAll();

        return $this->render('SimpleAgendaBundle:Circle:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Circle entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SimpleAgendaBundle:Circle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Circle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SimpleAgendaBundle:Circle:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Circle entity.
     *
     */
    public function newAction()
    {
        $entity = new Circle();
        $form   = $this->createForm(new CircleType(), $entity);

        return $this->render('SimpleAgendaBundle:Circle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Circle entity.
     *
     */
    public function createAction()
    {
        $entity  = new Circle();
        $request = $this->getRequest();
        $form    = $this->createForm(new CircleType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('circle_show', array('id' => $entity->getId())));
            
        }

        return $this->render('SimpleAgendaBundle:Circle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Circle entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SimpleAgendaBundle:Circle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Circle entity.');
        }

        $editForm = $this->createForm(new CircleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SimpleAgendaBundle:Circle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Circle entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SimpleAgendaBundle:Circle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Circle entity.');
        }

        $editForm   = $this->createForm(new CircleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('circle_edit', array('id' => $id)));
        }

        return $this->render('SimpleAgendaBundle:Circle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Circle entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('SimpleAgendaBundle:Circle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Circle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('circle'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
