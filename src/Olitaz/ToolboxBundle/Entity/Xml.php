<?php

namespace Olitaz\ToolboxBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Xml
{

    /**
     * @Assert\NotBlank()
     */
    protected $content;

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

}