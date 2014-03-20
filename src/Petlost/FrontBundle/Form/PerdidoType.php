<?php

namespace Petlost\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Petlost\FrontBundle\Form\AnuncioType;

class PerdidoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)     {
        $builder->add('fecha_extravio');
        $builder->add('celular');
        $builder->add('anuncio',new AnuncioType());
    }

    public function getName()     {
        return 'perdido';
    }

}
