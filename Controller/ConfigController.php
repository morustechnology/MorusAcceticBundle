<?php

namespace Morus\AcceticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Morus\AcceticBundle\Entity\Transaction;
use Symfony\Component\HttpFoundation\Response;

/**
 * Configuration controller.
 *
 */
class ConfigController extends Controller {
    
    public function invoiceAction() {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        // Get ar with invoices lines
        $configGroup = $aem->getAcceticConfigGroupRepository()
                ->findOneByName('INVOICE');
        
        if (!$configGroup) {
            throw $this->createNotFoundException('Unable to find Configuration Group entity.');
        }
        
        $form = $this->genEditForm($configGroup);
        
        return $this->render('MorusAcceticBundle:Config:invoice.html.twig', array(
            'configGroup' => $configGroup,
            'form' => $form->createView(),
        ));
    }
    
    public function invoiceUpdateAction(Request $request) {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        // Get ar with invoices lines
        $configGroup = $aem->getAcceticConfigGroupRepository()
                ->findOneByName('INVOICE');
        

        if (!$configGroup) {
            throw $this->createNotFoundException('Unable to find Configuration Group entity.');
        }
        
        $form = $this->genEditForm($configGroup);
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($configGroup);
            $em->flush();
            
            return $this->redirect($this->generateUrl('morus_accetic_config_invoice'));
        }

        return $this->render('MorusAcceticBundle:Config:invoice.html.twig', array(
            'configGroup' => $configGroup,
            'form' => $form->createView(),
        ));
    }
    
    /**
    * Creates a form to edit a Transaction entity.
    *
    * @param Transaction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function genEditForm($configGroup)
    {
        $form = $this->createForm('accetic_config_group', $configGroup, array(
            'attr' => array( 'id' => 'morus_accetic_config_inv_edit_form'),
            'action' => $this->generateUrl('morus_accetic_config_invoice_update'),
            'method' => 'PUT',
        ));
        
        $form->add('save', 'submit', array(
            'label' => $this->get('translator')->trans('btn.save'),
            ));

        return $form;
    }
}
