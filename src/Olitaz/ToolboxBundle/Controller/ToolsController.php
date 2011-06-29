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
                }
            }
        }

        return $this->render('OlitazToolboxBundle:Tools:regex.html.twig', array(
            'form' => $form->createView(),
            'result' => isset($result) ? $result : null
        ));
    }

    public function xmlIndentAction()
    {
        $xml = new Xml();

        $form = $this->createForm(new XmlType(), $xml);

        return $this->render('OlitazToolboxBundle:Tools:xml_indent.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
