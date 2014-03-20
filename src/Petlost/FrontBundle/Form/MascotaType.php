<?php

namespace Petlost\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MascotaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)     {
        $builder->add('nombre');
        $builder->add('raza');
        $builder->add('sexo');
        $builder->add('identificacion');
        $builder->add('enfermedad');
        $builder->add('fotos');
        
        
        
    }

    public function getName()     {
        return 'mascota';
    }

}