<?php

namespace Olitaz\ToolboxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegexType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('type', 'choice', array(
            'choices' => array('preg_match_all' => 'preg_match_all', 'preg_replace' => 'preg_replace'),
            'expanded' => true
        ));
        $builder->add('pattern', 'textarea');
        $builder->add('subject', 'textarea');
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Olitaz\ToolboxBundle\Entity\Regex',
        );
    }

}