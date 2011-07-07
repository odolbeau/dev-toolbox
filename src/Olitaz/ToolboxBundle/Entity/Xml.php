<?php

namespace Olitaz\ToolboxBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Xml
{

    const INDENTATION = "X";

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
            return $this->formatXml($xml, 0);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    protected function formatXml(\XMLReader $xml, $level= 0) {
        echo $level.'<br />';
        $indentedXml = '';
        while($xml->read()) {
            switch ($xml->nodeType) {
                case \XMLReader::ELEMENT:
                    $nodeName = $xml->localName;
                    $indentedXml .= $this->getIndentation($level) . '<' . $nodeName . ' ';
                    if($xml->hasAttributes()) {
                        while($xml->moveToNextAttribute()) {
                            
                        }
                    }
                    $indentedXml .= $this->formatXml($xml, $level+1);
                    $indentedXml .= $this->getIndentation($level) . '</' . $nodeName . '><br />';
                    break;
                case \XMLReader::END_ELEMENT:
                    return $indentedXml;
                    break;
            }
        }
        return $indentedXml;
    }

    protected function getIndentation($level = 0) {
        $indentation = '';
        for($i=0; $i<$level; $i++) {
            $indentation .= self::INDENTATION;
        }
        return $indentation;
    }

}
