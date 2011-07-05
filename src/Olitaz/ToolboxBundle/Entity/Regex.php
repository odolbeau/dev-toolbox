<?php

namespace Olitaz\ToolboxBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Regex
{

    /**
     * @Assert\Choice(
     *     choices = { "preg_match_all", "preg_replace" },
     *     message = "Choose."
     * )
     */
    protected $type;
    /**
     * @Assert\NotBlank()
     */
    protected $pattern;
    /**
     * @Assert\NotBlank()
     */
    protected $subject;
    protected $replacement;

    public function __construct()
    {
        $this->setType('preg_match_all');
    }

    /**
     * Process the regex
     *
     * @return type
     */
    public function process()
    {
        switch ($this->type) {
            case 'preg_match_all':
                try {
                    $count = preg_match_all($this->pattern, $this->subject, $matches);
                    return $matches;
                } catch(\Exception $e) {
                    return $e->getMessage();
                }
                break;
            case 'preg_replace':
                try {
                    $result = preg_replace($this->pattern, $this->replacement, $this->subject, -1, $count);
                    return $result;
                } catch(\Exception $e) {
                    return $e->getMessage();
                }
                break;
            default:
                return null;
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getReplacement()
    {
        return $this->replacement;
    }

    public function setReplacement($replacement)
    {
        $this->replacement = $replacement;
    }

}
