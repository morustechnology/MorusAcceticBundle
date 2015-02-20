<?php

namespace Morus\AcceticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use Morus\AcceticBundle\Entity\Parts;

/**
 * Parts controller.
 *
 */
class InventoryController extends Controller
{
    /**
     * Handle Ajax call for deleting Parts.
     *
     */
    public function editAjaxAction(Request $request){
        try {
            $em = $this->getDoctrine()->getManager();
            
            $data = $request->get('accetic_parts');
            $id = $data['id'];
            $parts = $em->getRepository('MorusAcceticBundle:Parts')->find($id);
            $parts->setItemcode(array_key_exists('itemcode', $data) ? $data['itemcode'] : null);
            $parts->setItemname(array_key_exists('itemname', $data) ? $data['itemname'] : null);
            $parts->setUnit(array_key_exists('unit', $data) ? $data['unit'] : null);
            $parts->setForsale(array_key_exists('forsale', $data) ? $data['forsale'] : null);
            $parts->setListprice(array_key_exists('listprice', $data) ? floatval($data['listprice']) : null);
            $parts->setSaleDescription(array_key_exists('saleDescription', $data) ? $data['saleDescription'] : null);
            $parts->setForpurchase(array_key_exists('forpurchase', $data) ? $data['forpurchase'] : null);
            $parts->setLastcost(array_key_exists('lastcost', $data) ? floatval($data['lastcost']) : null);
            $parts->setPurchaseDescription(array_key_exists('purchaseDescription', $data) ? $data['purchaseDescription'] : null);
            
            
            $em->persist($parts);
            
            $em->flush();
            
            return new Response(json_encode(array(
                "success" => true
                )));
        } catch (Exception $ex) {
            return new Response(json_encode(array(
                "success" => false
                )));
        }
    }
    
    /**
     * Handle Ajax call for deleting Parts.
     *
     */
    public function deleteAjaxAction(Request $request){
        try {
            $ids = array();
            $em = $this->getDoctrine()->getManager();
            foreach($request->request->all() as $req){
                $parts = $this->getDoctrine()->getRepository('MorusAcceticBundle:Parts')->findOneById($req);
                $em->remove($parts);
            }
            $em->flush();
            
            return new Response(json_encode(array(
                "success" => true
                )));
        } catch (Exception $ex) {
            return new Response(json_encode(array(
                "success" => false
                )));
        }
    }
    
    /**
     * Handle Ajax call for creating new Parts.
     *
     */
    public function newAjaxAction(Request $request) {
        try {
            $data = $request->get('accetic_parts');

            $parts = new Parts();
            $parts->setItemcode(array_key_exists('itemcode', $data) ? $data['itemcode'] : null);
            $parts->setItemname(array_key_exists('itemname', $data) ? $data['itemname'] : null);
            $parts->setUnit(array_key_exists('unit', $data) ? $data['unit'] : null);
            $parts->setForsale(array_key_exists('forsale', $data) ? $data['forsale'] : null);
            $parts->setListprice(array_key_exists('listprice', $data) ? floatval($data['listprice']) : null);
            $parts->setSaleDescription(array_key_exists('saleDescription', $data) ? $data['saleDescription'] : null);
            $parts->setForpurchase(array_key_exists('forpurchase', $data) ? $data['forpurchase'] : null);
            $parts->setLastcost(array_key_exists('lastcost', $data) ? floatval($data['lastcost']) : null);
            $parts->setPurchaseDescription(array_key_exists('purchaseDescription', $data) ? $data['purchaseDescription'] : null);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($parts);
            
            $em->flush();
            $response = array("success" => true);
            return new Response(json_encode($response));
        } catch (Exception $ex) {
            $response = array("success" => false);
            return new Response(json_encode($response));
        }
    }
    
    /**
     * Lists all Parts entities.
     *
     */
    public function indexAction(Request $request)
    {
        // List All parts
        $em = $this->getDoctrine()->getManager();
        $parts = $em->getRepository('MorusAcceticBundle:Parts')->findAll();
        $parts_list_form = $this->createForm('accetic_parts_list', $parts, array(
            'attr' => array('id' => 'accetic_parts_list'),
            'action' => $this->generateUrl('morus_accetic_inventory_delete_ajax'),
            'method' => 'POST',
        ));
        
        $parts_list_form->add('delete_parts', 'submit', array(
                'label' => $this->get('translator')->trans('btn.delete'),
                'attr' => array('style' => 'display:none')
            ));
        
        // New Item Form
        $newParts = new Parts();
        $newParts->setForSale(true);
        $parts_new_form = $this->createForm('accetic_parts', $newParts, array(
            'attr' => array('id' => 'accetic_parts_new'),
            'action' => $this->generateUrl('morus_accetic_inventory_new_ajax'),
            'method' => 'POST',
        ));
        
        $parts_new_form->add('submit', 'submit', array(
                'label' => $this->get('translator')->trans('btn.save'),
                'attr' => array('style' => 'display:none')
            ));
        
        return $this->render('MorusAcceticBundle:Inventory:index.html.twig', array(
            'parts_new_form' => $parts_new_form->createView(),
            'parts_list_form' => $parts_list_form->createView(),
            'parts' => $parts
        ));
    }
    
    /**
     * Finds and displays a Parts entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $parts = $em->getRepository('MorusAcceticBundle:Parts')->find($id);

        if (!$parts) {
            throw $this->createNotFoundException('Unable to find Parts entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        
        // Edit Item Form
        $parts_edit_form = $this->createForm('accetic_parts', $parts, array(
            'attr' => array('id' => 'accetic_parts_edit'),
            'action' => $this->generateUrl('morus_accetic_inventory_edit_ajax'),
            'method' => 'POST',
        ));
        
        $parts_edit_form->add('submit', 'submit', array(
                'label' => $this->get('translator')->trans('btn.save'),
                'attr' => array('style' => 'display:none')
            ));
        
        return $this->render('MorusAcceticBundle:Inventory:show.html.twig', array(
            'parts'      => $parts,
            'parts_edit_form' => $parts_edit_form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Deletes a Parts entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MorusAcceticBundle:Parts')->find($id);
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Parts entity.');
            }
            
            $em->remove($entity);
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('morus_accetic_inventory'));
    }

    /**
     * Creates a form to delete a Parts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(null, array('attr' => array( 'id' => 'pts_del')))
            ->setAction($this->generateUrl('morus_accetic_inventory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => $this->get('translator')->trans('btn.delete')))
            ->getForm()
        ;
    }
}
