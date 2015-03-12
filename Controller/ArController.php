<?php

namespace Morus\AcceticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Morus\AcceticBundle\Entity\Transaction;

/**
 * Ar controller.
 *
 */
class ArController extends Controller
{
    /**
     * Lists all Transaction entities.
     *
     */
    public function indexAction()
    {        
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        $tranRepos = $aem->getArRepository();
        
        $ars = $aem->getArRepository()->findAll();
        
        return $this->render($this->container->getParameter('morus_accetic.template.ar.index'), array(
            'ars' => $ars,
        ));
    }
    
    /**
     * Creates a new Transaction entity.
     *
     */
    public function createAction(Request $request)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        $ar = $aem->createAr();
        
        $form = $this->genCreateForm($ar);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ar);
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_ar'));
        }

        return $this->render('MorusAcceticBundle:Ar:new.html.twig', array(
            'ar' => $ar,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Transaction entity.
     *
     * @param Transaction $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function genCreateForm($ar)
    {
        $form = $this->createForm('accetic_ar', $ar, array(
            'attr' => array( 'id' => 'morus_accetic_ar_new_form'),
            'action' => $this->generateUrl('morus_accetic_ar_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array(
                'label' => $this->get('translator')->trans('btn.save'),
                'attr' => array('style' => 'display:none')
            ));
        
        return $form;
    }

    /**
     * Displays a form to create a new Transaction entity.
     *
     */
    public function newAction()
    {     
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        $ar = $aem->createAr();

        $form   = $this->genCreateForm($ar);
        return $this->render('MorusAcceticBundle:Ar:new.html.twig', array(
            'transaction' => $ar,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Transaction entity.
     *
     */
    public function editAction($id)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service

        // Get ar with invoices lines
        $qb = $aem->getArRepository()
                ->createQueryBuilder('ar');
        
        $query = $qb
                ->select('ar')
                ->join('ar.transaction', 't')
                ->leftJoin('t.invoices', 'v')
                ->where($qb->expr()->eq('ar.id', $id));
        
        $ar = $query->getQuery()->getSingleResult();

        if (!$ar) {
            throw $this->createNotFoundException('Unable to find Ar entity.');
        }

        $editForm = $this->genEditForm($ar);
        $deleteForm = $this->genDeleteForm($id);

        return $this->render('MorusAcceticBundle:Ar:edit.html.twig', array(
            'ar'      => $ar,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Transaction entity.
    *
    * @param Transaction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function genEditForm($ar)
    {
        $form = $this->createForm('accetic_ar', $ar, array(
            'attr' => array( 'id' => 'morus_accetic_ar_edit_form'),
            'action' => $this->generateUrl('morus_accetic_ar_update', array('id' => $ar->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
            'label' => false,
            'attr' => array( 'style' => 'display:none')
            ));

        return $form;
    }
    
    /**
     * Edits an existing Transaction entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        // Get ar with invoices lines
        $qb = $aem->getArRepository()
                ->createQueryBuilder('ar');
        
        $query = $qb
                ->select('ar')
                ->join('ar.transaction', 't')
                ->leftJoin('t.invoices', 'v')
                ->where($qb->expr()->eq('ar.id', $id));
        
        $ar = $query->getQuery()->getSingleResult();


        if (!$ar) {
            throw $this->createNotFoundException('Unable to find Transaction entity.');
        }

        $deleteForm = $this->genDeleteForm($id);
        $editForm = $this->genEditForm($ar);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_ar'));
        }

        return $this->render('MorusAcceticBundle:Ar:edit.html.twig', array(
            'ar'      => $ar,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Deletes a Transaction entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->genDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
            $entity = $aem->getTransactionRepository()->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Transaction entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trans'));
    }

    /**
     * Creates a form to delete a Transaction entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function genDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('morus_accetic_ar_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
