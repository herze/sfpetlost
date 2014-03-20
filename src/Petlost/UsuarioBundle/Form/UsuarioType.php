<?php

namespace Petlost\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)     {
        $builder->add('nombre');
        $builder->add('apellidos');
        $builder->add('email');
        $builder->add('password','repeated',array(
            'type'=>'password','invalid_message'=>'Las dos contraseñas deven ser iguales',
            'options'=>array('label'=>'Contraseña'),
            'second_options'=>array('label'=>'Repita la contraseña')
            
        ));
    }

    public function getName()     {
        return 'usuario';
    }

}


