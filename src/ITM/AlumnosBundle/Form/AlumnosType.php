<?php

namespace ITM\AlumnosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlumnosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nocontrol', 'text')
            ->add('nombre', 'text')
            ->add('apellidoPaterno', 'text')
            ->add('apellidoMaterno', 'text')
            ->add('carrera')
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ITM\AlumnosBundle\Entity\Alumnos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'escuelademo_alumnosbundle_alumnos';
    }
}
