<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvoiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('parts', 'entity', array(
                'class' => 'MorusAcceticBundle:Parts',
                'property' => 'itemcode'
            ))
            ->add('description', 'text')
            ->add('qty', 'number', array(
                'precision' => 2,
            ))
            ->add('sellprice', 'number', array(
                'precision' => 2
            ))
            ->add('discount', 'number', array(
                'precision' => 2
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Morus\AcceticBundle\Entity\Invoice'
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
