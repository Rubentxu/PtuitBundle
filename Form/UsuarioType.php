<?php

namespace amiguetes\PtuitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UsuarioType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('nick');
        $builder->add('nombre');
        $builder->add('edad', 'integer',array('required' => false));
        $builder->add('telefono', 'text',array('required' => false));
        $builder->add('localizacion', 'text',array('required' => false));
        $builder->add('email', 'email');
        $builder->add('intereses', 'textarea',array('required' => false));
        $builder->add('biografia', 'textarea',array('required' => false));       
        $builder->add('web', 'text',array('required' => false));
        $builder->add('password', 'repeated', array('type' => 'password'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'amiguetes\PtuitBundle\Entity\Usuario',
        );
    }
    public function getName(){
        return 'registro';
    }

}
