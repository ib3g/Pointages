<?php

namespace AppBundle\Controller;

use AppBundle\Entity\pointage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pointage controller.
 *
 * @Route("pointage")
 */
class pointageController extends Controller
{


    /**
     * affectation all company entities.
     *
     * @Route("/affect", name="affect")
     * @Method("GET")
     */
    public function affectationAction(Request $request)
    {
        return new JsonResponse(' succès');
    }

    /**
     * Lists all pointage entities.
     *
     * @Route("/", name="pointage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pointages = $em->getRepository('AppBundle:pointage')->findAll();

        return $this->render('pointage/index.html.twig', array(
            'pointages' => $pointages,
        ));
    }

    /**
     * Creates a new pointage entity.
     *
     * @Route("/new", name="pointage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pointage = new Pointage();
        $form = $this->createForm('AppBundle\Form\pointageType', $pointage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pointage);
            $em->flush();

            return $this->redirectToRoute('pointage_show', array('id' => $pointage->getId()));
        }

        return $this->render('pointage/new.html.twig', array(
            'pointage' => $pointage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pointage entity.
     *
     * @Route("/{id}", name="pointage_show")
     * @Method("GET")
     */
    public function showAction(pointage $pointage)
    {
        $deleteForm = $this->createDeleteForm($pointage);

        return $this->render('pointage/show.html.twig', array(
            'pointage' => $pointage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pointage entity.
     *
     * @Route("/{id}/edit", name="pointage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, pointage $pointage)
    {
        $deleteForm = $this->createDeleteForm($pointage);
        $editForm = $this->createForm('AppBundle\Form\pointageType', $pointage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pointage_edit', array('id' => $pointage->getId()));
        }

        return $this->render('pointage/edit.html.twig', array(
            'pointage' => $pointage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pointage entity.
     *
     * @Route("/{id}", name="pointage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, pointage $pointage)
    {
        $form = $this->createDeleteForm($pointage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pointage);
            $em->flush();
        }

        return $this->redirectToRoute('pointage_index');
    }

    /**
     * Creates a form to delete a pointage entity.
     *
     * @param pointage $pointage The pointage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(pointage $pointage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pointage_delete', array('id' => $pointage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
