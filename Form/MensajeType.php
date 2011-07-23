<?php

namespace amiguetes\PtuitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MensajeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombreusuario')
            ->add('creado')
            ->add('modificado')
            ->add('texto')
            ->add('replicadoPorUsuario')
            ->add('usuarioid')
            ->add('tagid')
            ->add('usuario')
        ;
    }
}