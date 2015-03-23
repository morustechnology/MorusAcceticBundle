<?php

namespace Morus\AcceticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use Morus\AcceticBundle\Entity\Product;

/**
 * Product controller.
 *
 */
class InventoryController extends Controller
{
    /**
     * Handle Ajax call for deleting Product.
     *
     */
    public function editAjaxAction(Request $request){
        try {
            $em = $this->getDoctrine()->getManager();
            
            $data = $request->get('accetic_product');
            $id = $data['id'];
            $product = $em->getRepository('MorusAcceticBundle:Product')->find($id);
            $product->setItemcode(array_key_exists('itemcode', $data) ? $data['itemcode'] : null);
            $product->setItemname(array_key_exists('itemname', $data) ? $data['itemname'] : null);
            $product->setUnit(array_key_exists('unit', $data) ? $data['unit'] : null);
            $product->setForsale(array_key_exists('forsale', $data) ? $data['forsale'] : null);
            $product->setListprice(array_key_exists('listprice', $data) ? floatval($data['listprice']) : null);
            $product->setSaleDescription(array_key_exists('saleDescription', $data) ? $data['saleDescription'] : null);
            $product->setForpurchase(array_key_exists('forpurchase', $data) ? $data['forpurchase'] : null);
            $product->setLastcost(array_key_exists('lastcost', $data) ? floatval($data['lastcost']) : null);
            $product->setPurchaseDescription(array_key_exists('purchaseDescription', $data) ? $data['purchaseDescription'] : null);
            
            
            $em->persist($product);
            
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
     * Handle Ajax call for deleting Product.
     *
     */
    public function deleteAjaxAction(Request $request){
        try {
            $ids = array();
            $em = $this->getDoctrine()->getManager();
            foreach($request->request->all() as $req){
                $product = $this->getDoctrine()->getRepository('MorusAcceticBundle:Product')->findOneById($req);
                $em->remove($product);
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
     * Handle Ajax call for creating new Product.
     *
     */
    public function newAjaxAction(Request $request) {
        try {
            $data = $request->get('accetic_product');
            
            $product = new Product();
            $product->setItemcode(array_key_exists('itemcode', $data) ? $data['itemcode'] : null);
            $product->setItemname(array_key_exists('itemname', $data) ? $data['itemname'] : null);
            $product->setUnit(array_key_exists('unit', $data) ? $data['unit'] : null);
            $product->setForsale(array_key_exists('forsale', $data) ? $data['forsale'] : null);
            $product->setListprice(array_key_exists('listprice', $data) ? floatval($data['listprice']) : null);
            $product->setSaleDescription(array_key_exists('saleDescription', $data) ? $data['saleDescription'] : null);
            $product->setForpurchase(array_key_exists('forpurchase', $data) ? $data['forpurchase'] : null);
            $product->setLastcost(array_key_exists('lastcost', $data) ? floatval($data['lastcost']) : null);
            $product->setPurchaseDescription(array_key_exists('purchaseDescription', $data) ? $data['purchaseDescription'] : null);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            
            $em->flush();
            $response = array("success" => true);
            return new Response(json_encode($response));
        } catch (Exception $ex) {
            $response = array("success" => false);
            return new Response(json_encode($response));
        }
    }
    
    /**
     * Lists all Product entities.
     *
     */
    public function indexAction(Request $request)
    {
        // List All product
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        
        
        $product = $aem->getProductRepository()->findAll();
        
        $product_list_form = $this->createForm('accetic_product_list', $product, array(
            'attr' => array('id' => 'accetic_product_list'),
            'action' => $this->generateUrl('morus_accetic_inventory_delete_ajax'),
            'method' => 'POST',
        ));
        
        $product_list_form->add('delete_product', 'submit', array(
                'label' => $this->get('translator')->trans('btn.delete'),
                'attr' => array('style' => 'display:none')
            ));
        
        // New Item Form
        $newProduct = $aem->createProduct();
        $newProduct->setForSale(true);
        $product_new_form = $this->createForm('accetic_product', $newProduct, array(
            'attr' => array('id' => 'accetic_product_new'),
            'action' => $this->generateUrl('morus_accetic_inventory_new_ajax'),
            'method' => 'POST',
        ));
        
        $product_new_form->add('submit', 'submit', array(
            'label' => $this->get('translator')->trans('btn.save'),
            'attr' => array('style' => 'display:none')
        ));
        
        return $this->render('MorusAcceticBundle:Inventory:index.html.twig', array(
            'product_new_form' => $product_new_form->createView(),
            'product_list_form' => $product_list_form->createView(),
            'product' => $product
        ));
    }
    
    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service

        $product = $aem->getProductRepository()->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }
        
        // Edit Item Form
        $product_edit_form = $this->createForm('accetic_product', $product, array(
            'attr' => array('id' => 'accetic_product_edit'),
            'action' => $this->generateUrl('morus_accetic_inventory_edit_ajax'),
            'method' => 'POST',
        ));
        
        $product_edit_form->add('submit', 'submit', array(
                'label' => $this->get('translator')->trans('btn.save'),
                'attr' => array('style' => 'display:none'),
            ));
        
        return $this->render('MorusAcceticBundle:Inventory:show.html.twig', array(
            'product'      => $product,
            'product_edit_form' => $product_edit_form->createView(),
        ));
    }
    
    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $aem = $this->get('morus_accetic.entity_manager'); // Get Accetic Entity Manager from service
        $entity = $aem->getProductRepository()->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('morus_accetic_inventory'));
    }

    /**
     * Creates a form to delete a Product entity by id.
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
