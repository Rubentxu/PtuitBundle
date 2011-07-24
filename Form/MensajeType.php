<?php

namespace amiguetes\PtuitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MensajeType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('texto');
    }

    public function getName() {
        return "Mensaje";
    }

    public function getDefaultOptions(array $options) {
        return array('data_class' => 'amiguetes\PtuitBundle\Entity\Mensaje');
    }

}