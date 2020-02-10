<?php

namespace coursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('coursBundle:Default:index.html.twig');
    }
}
