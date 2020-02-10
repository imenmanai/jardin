<?php

namespace enfantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('enfantBundle:Default:index.html.twig');
    }
}
