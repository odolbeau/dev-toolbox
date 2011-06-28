<?php

namespace Olitaz\ToolboxBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Regex {

    /**
     * @Assert\Choice(
     *     choices = { "preg_match", "preg_replace" },
     *     message = "Choose."
     * )
     */
    private $type;
    /**
     * @Assert\NotBlank()
     */
    private $pattern;
    /**
     * @Assert\NotBlank()
     */
    private $subject;
    private $replacement;
    
    public function __construct() {
        $this->setType('preg_match');
    }


    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getPattern() {
        return $this->pattern;
    }

    public function setPattern($pattern) {
        $this->pattern = $pattern;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function getReplacement() {
        return $this->replacement;
    }

    public function setReplacement($replacement) {
        $this->replacement = $replacement;
    }

}