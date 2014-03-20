<?php

namespace Petlost\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AnuncioType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)     {
        $builder->add('titulo');
        $builder->add('descripcion');
        $builder->add('mascota',new MascotaType());
        $builder->add('zonas');
    }

    public function getName()     {
        return 'anuncio';
    }

}