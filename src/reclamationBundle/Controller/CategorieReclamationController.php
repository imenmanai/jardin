<?php

namespace reclamationBundle\Controller;

use reclamationBundle\Entity\CategorieReclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieReclamationController extends Controller
{
    public function indexAction()
    {
        return $this->render('reclamationBundle:Default:index.html.twig');
    }
    public function afficherCategorieReclamationAction()
    {
        $CategorieReclamations=$this->getDoctrine()
            ->getRepository(CategorieReclamation::class)->findAll();
        return $this->render('@reclamation/view/afficherCategorieReclamation.html.twig',array('CategorieReclamations'=>$CategorieReclamations));
    }
}
