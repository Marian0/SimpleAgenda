<?php

namespace HotDesign\SimpleAgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CircleType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Nombre Circulo'))
        ;
    }

    public function getName()
    {
        return 'hotdesign_simpleagendabundle_circletype';
    }
}
