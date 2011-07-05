<?php

namespace Olitaz\ToolboxBundle\Controller;

use Olitaz\ToolboxBundle\Entity\Regex;
use Olitaz\ToolboxBundle\Entity\Xml;
use Olitaz\ToolboxBundle\Form\RegexType;
use Olitaz\ToolboxBundle\Form\XmlType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ToolsController extends Controller
{

    public function regexAction()
    {
        $regex = new Regex();

        $form = $this->createForm(new RegexType(), $regex);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // Process Regex
                $result = $regex->process();
                if (is_array($result)) {
                    $result = print_r($result, true);
                    $addPre = true;
                }
            }
        }

        $vars = array(
            'form' => $form->createView(),
        );
        if(isset($result)) {
            $vars['result'] = $result;
        }
        if(isset($addPre)) {
            $vars['add_pre'] = $addPre;
        }
        return $this->render('OlitazToolboxBundle:Tools:regex.html.twig', $vars);
    }

    public function xmlIndentAction()
    {
        $xml = new Xml();

        $form = $this->createForm(new XmlType(), $xml);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // Process Xml
                $result = $xml->process();
            }
        }

        return $this->render('OlitazToolboxBundle:Tools:xml_indent.html.twig', array(
            'form' => $form->createView(),
            'result' => isset($result) ? $result : null
        ));
    }

}
