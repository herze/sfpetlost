<?php

namespace Petlost\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ZonaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)     {
        $builder->add('latitud');
        $builder->add('longitud');
        $builder->add('direccion');
    }

    public function getDefaultOptions(array $options)     {
        return array(
            'data_class' => null,
        );
    }

    public function getName()     {
        return 'zona';
    }

}
?>

