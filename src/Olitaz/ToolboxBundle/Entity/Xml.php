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
 
    public function process() {
        try {
            $xml = new \XMLReader();
            $xml->xml($this->content);
            $xml->setParserProperty(\XMLReader::VALIDATE, true);
            if($xml->isValid()) {
                while($xml->read()) {

                }
            } else {
                return false;
            }
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

}
