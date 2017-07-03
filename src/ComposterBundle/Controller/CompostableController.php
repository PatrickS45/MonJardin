<?php

namespace ComposterBundle\Controller;

use ComposterBundle\Entity\Compostable;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Compostable controller.
 *
 * @Route("compostable")
 */
class CompostableController extends Controller
{
    /**
     * Lists all compostable entities.
     *
     * @Route("/", name="compostable_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compostables = $em->getRepository('ComposterBundle:Compostable')->findAll();

        return $this->render('compostable/index.html.twig', array(
            'compostables' => $compostables,
        ));
    }

    /**
     * Creates a new compostable entity.
     *
     * @Route("/new", name="compostable_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $compostable = new Compostable();
        $form = $this->createForm('ComposterBundle\Form\CompostableType', $compostable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compostable);
            $em->flush();

            return $this->redirectToRoute('compostable_show', array('id' => $compostable->getId()));
        }

        return $this->render('compostable/new.html.twig', array(
            'compostable' => $compostable,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a compostable entity.
     *
     * @Route("/{id}", name="compostable_show")
     * @Method("GET")
     */
    public function showAction(Compostable $compostable)
    {
        $deleteForm = $this->createDeleteForm($compostable);

        return $this->render('compostable/show.html.twig', array(
            'compostable' => $compostable,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing compostable entity.
     *
     * @Route("/{id}/edit", name="compostable_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Compostable $compostable)
    {
        $deleteForm = $this->createDeleteForm($compostable);
        $editForm = $this->createForm('ComposterBundle\Form\CompostableType', $compostable);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compostable_edit', array('id' => $compostable->getId()));
        }

        return $this->render('compostable/edit.html.twig', array(
            'compostable' => $compostable,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a compostable entity.
     *
     * @Route("/{id}", name="compostable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Compostable $compostable)
    {
        $form = $this->createDeleteForm($compostable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($compostable);
            $em->flush();
        }

        return $this->redirectToRoute('compostable_index');
    }

    /**
     * Creates a form to delete a compostable entity.
     *
     * @param Compostable $compostable The compostable entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Compostable $compostable)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compostable_delete', array('id' => $compostable->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
