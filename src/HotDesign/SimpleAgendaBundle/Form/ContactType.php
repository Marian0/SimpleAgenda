<?php

namespace HotDesign\SimpleAgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use HotDesign\SimpleAgendaBundle\Entity\StaticCompany;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                    'label' => 'Nombre Contacto',
                    'required' => true,
                ))
            ->add('facebook_user', null, array(
                    'label' => 'Usuario de Facebook',
                    'required' => false,
                ))
            ->add('cod_area', 'text', array(
                    'label' => 'Código de Área',
                    'required' => true,
                ))
            ->add('phone', 'text' ,array(
                    'label' => 'Teléfono',
                    'required' => true,
                ) )
            //->add('msg_count')
            ->add('company_id', 'choice', array(
                    'label' => 'Companía',
                    'choices' => StaticCompany::getChoices(),
                    'required' => false,
                ))
            ->add('circle', null, array(
                    'label' => 'Círculo',
                ))
        ;
    }

    public function getName()
    {
        return 'hotdesign_simpleagendabundle_contacttype';
    }
}
