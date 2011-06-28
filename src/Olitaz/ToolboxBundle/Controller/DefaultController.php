<?php

namespace Olitaz\ToolboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OlitazToolboxBundle:Default:index.html.twig');
    }
}
