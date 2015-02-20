<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('itemcode' , 'text')
            ->add('itemname' , 'text')
            ->add('unit' , 'text' , array(
                'required' => false
            ))
            ->add('forsale', 'checkbox', array(
                'required' => false
            ))
            ->add('listprice' , 'money', array(
                'currency' => 'HKD',
                'precision' => 2,
                'required' => false
            ))
            ->add('saleDescription' , 'text', array(
                'required' => false
            ))
            ->add('forpurchase', 'checkbox', array(
                'required' => false
            ))
            ->add('lastcost' , 'money', array(
                'currency' => 'HKD',
                'precision' => 2,
                'required' => false
            ))
            ->add('purchaseDescription' , 'text', array(
                'required' => false
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Morus\AcceticBundle\Entity\Parts',
            'attr' => ['id' => 'accetic_parts']
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'accetic_parts';
    }
}
