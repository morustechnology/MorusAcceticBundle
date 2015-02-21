<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvoicesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('description', 'text')
//            ->add('qty', 'number', array(
//                'precision' => 2
//            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
//        $resolver->setDefaults(array(
//            'data_class' => 'Morus\AcceticBundle\Entity\Invoice'
//        ));
    }
    
    public function getParent()
    {
        return 'collection';
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'accetic_invoices';
    }
}
