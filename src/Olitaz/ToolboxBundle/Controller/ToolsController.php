<?php

namespace Olitaz\ToolboxBundle\Controller;

use Olitaz\ToolboxBundle\Entity\Regex;
use Olitaz\ToolboxBundle\Form\RegexType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ToolsController extends Controller {

    public function regexAction() {
        $regex = new Regex();

        $form = $this->createForm(new RegexType(), $regex);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
//                $result = preg_match($regex->getPattern(), $regex->getSubject());
            }
        }

        return $this->render('OlitazToolboxBundle:Tools:regex.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
