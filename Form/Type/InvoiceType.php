<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class InvoiceType extends AbstractType
{
    protected $container;
    
    /**
     * 
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product', 'entity', array(
                'class' => $this->container->getParameter('morus_accetic.model.product'),
                'property' => 'itemcode',
                'required' => false
            ))
            ->add('description', 'text', array(
                'required' => false
            ))
            ->add('qty', 'number', array(
                'precision' => 2,
                'required' => false
            ))
            ->add('sellprice', 'number', array(
                'precision' => 2,
                'required' => false
            ))
            ->add('discount', 'number', array(
                'precision' => 2,
                'required' => false
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->container->getParameter('morus_accetic.model.invoice'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'accetic_invoice';
    }
}
