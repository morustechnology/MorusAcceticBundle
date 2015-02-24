<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unit', 'entity', array(
                'class' => 'MorusAcceticBundle:Unit',
                'property' => 'name'
            ))
            ->add('invnumber', 'text')
            ->add('transdate', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array('class' => 'date'),
                'required' => false,
            ))
            ->add('duedate', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array('class' => 'date'),
                'required' => false,
            ))
            ->add('reference', 'text', array(
                'required' => false,
            ))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Morus\AcceticBundle\Entity\Ar'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'accetic_ar';
    }
}
