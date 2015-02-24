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
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MorusAcceticBundle:Ar')->findAll();

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
        
        
        $entity = new Transaction();
        $form = $this->createCreateArForm($entity);
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
    private function createCreateArForm(Transaction $entity)
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
        $em = $this->getDoctrine()->getManager();
        
        $transaction = new Transaction();
        $ar = new Ar();
        $invoiceLine1 = new Invoice();
        $invoiceLine2 = new Invoice();
        $invoiceLine3 = new Invoice();
        $invoiceLine4 = new Invoice();
        
        // Get statement process
        $invPrefix = $em
                ->getRepository('MorusAcceticBundle:AcceticConfig')
                ->findOneByControlCode('INV_PREFIX');
        $invNextNumber = $em
                ->getRepository('MorusAcceticBundle:AcceticConfig')
                ->findOneByControlCode('INV_NEXT_NUM');
        
        if ($invPrefix && $invNextNumber) {
            $ar->setInvnumber($invPrefix->getValue() . $invNextNumber->getValue());
        }
        
        $transaction->setAr($ar);
        $transaction->addInvoice($invoiceLine1);
        $transaction->addInvoice($invoiceLine2);
        $transaction->addInvoice($invoiceLine3);
        $transaction->addInvoice($invoiceLine4);
        
        
        
        $form   = $this->createCreateArForm($transaction);
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MorusAcceticBundle:Transaction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transaction entity.');
        }

        $deleteForm = $this->createDeleteArForm($id);

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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MorusAcceticBundle:Transaction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transaction entity.');
        }

        $editForm = $this->createEditArForm($entity);
        $deleteForm = $this->createDeleteArForm($id);

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
    private function createEditArForm(Transaction $entity)
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MorusAcceticBundle:Transaction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transaction entity.');
        }

        $deleteForm = $this->createDeleteArForm($id);
        $editForm = $this->createEditArForm($entity);
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
        $form = $this->createDeleteArForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MorusAcceticBundle:Transaction')->find($id);

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
    private function createDeleteArForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('morus_accetic_ar_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
//    public function dataAction()
//    {
//
//        $rows = array();
//        
//        $invoices = $this->getDoctrine()
//                ->getRepository('MorusAcceticBundle:Invoice')
//                ->findAll();
//        
//        foreach ($invoices as $invoice) {
//            $rows[] = array(
////                'trans_id' => $invoice->getTransaction()->getId(),
//                'id' => $invoice->getId(), 
//                'description' => $invoice->getDescription(),
//                'sellprice' => $invoice->getSellprice(),
//                'qty' => $invoice->getQty(),
//                'discount' => $invoice->getDiscount(),
//                    );
//        }
//
//        return new JsonResponse($rows);
//    }
}
