<?php

namespace Olitaz\ToolboxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class XmlType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('content', 'textarea');
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Olitaz\ToolboxBundle\Entity\Xml',
        );
    }

}