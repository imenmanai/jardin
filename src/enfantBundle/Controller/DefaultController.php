<?php

namespace enfantBundle\Controller;

use enfantBundle\Entity\Bus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('enfantBundle:Default:index.html.twig');
    }
    public function afficherBusAction()
    {
        $buss=$this->getDoctrine()->getRepository(Bus::class)->findAll();
        return $this->render('@enfant/Default/afficherBus.html.twig',array('buss'=>$buss));
    }
}
