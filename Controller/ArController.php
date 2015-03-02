<?php

namespace Morus\AcceticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Morus\AcceticBundle\Entity\Transaction;
use Morus\AcceticBundle\Entity\Ar;
use Morus\AcceticBundle\Entity\Invoice;

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
        
        $entities = $aem->getArRepository()->findAll();
        
        return $this->render('MorusAcceticBundle:Ar:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Transaction entity.
     *
     */
    public function createAction(Request $request)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        $transaction = $aem->createArTransaction();
        
        $form = $this->genCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_ar_show', array('id' => $entity->getId())));
        }

        return $this->render('MorusAcceticBundle:Ar:new.html.twig', array(
            'entity' => $entity,
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
    private function genCreateForm(Transaction $entity)
    {
        $form = $this->createForm('accetic_ar_transaction', $entity, array(
            'attr' => array( 'id' => 'inv_new_form'),
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
        $transaction = $aem->createArTransaction();

        $form   = $this->genCreateForm($transaction);
        return $this->render('MorusAcceticBundle:Ar:new.html.twig', array(
            'transaction' => $transaction,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Transaction entity.
     *
     */
    public function showAction($id)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        $entity = $aem->getTransactionRepository()->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transaction entity.');
        }

        $deleteForm = $this->genDeleteForm($id);

        return $this->render('MorusAcceticBundle:Ar:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Transaction entity.
     *
     */
    public function editAction($id)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        $entity = $aem->getTransactionRepository()->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transaction entity.');
        }

        $editForm = $this->genEditForm($entity);
        $deleteForm = $this->genDeleteForm($id);

        return $this->render('MorusAcceticBundle:Ar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
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
    private function genEditForm(Transaction $entity)
    {
        $form = $this->createForm('accetic_ar_transaction', $entity, array(
            'action' => $this->generateUrl('morus_accetic_ar_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Transaction entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        $entity = $aem->getTransactionRepository()->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transaction entity.');
        }

        $deleteForm = $this->genDeleteForm($id);
        $editForm = $this->genEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_ar_edit', array('id' => $id)));
        }

        return $this->render('MorusAcceticBundle:Ar:edit.html.twig', array(
            'entity'      => $entity,
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
