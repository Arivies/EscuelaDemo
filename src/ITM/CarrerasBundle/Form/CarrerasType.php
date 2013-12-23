<?php

namespace ITM\CarrerasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarrerasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text')
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ITM\CarrerasBundle\Entity\Carreras'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'escuelademo_carrerasbundle_carreras';
    }
}
