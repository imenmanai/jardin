<?php

namespace reclamationBundle\Controller;

use reclamationBundle\Entity\CategorieReclamation;
use reclamationBundle\Entity\reclamation;
use reclamationBundle\Form\CategorieReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function ajouterCategorieReclamationAction(Request $request)
    {
        $CategorieReclamations =new CategorieReclamation();
        $form =$this->createForm(CategorieReclamationType::class, $CategorieReclamations);
        $form =$form->handleRequest($request);
        if ($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($CategorieReclamations);
            $em->flush();
            return $this->redirectToRoute("afficherCategorieReclamation");
        }
        return $this->render('@reclamation/view/ajouterCategorieReclamation.html.twig', array('f'=>$form->createView()));
    }

    public function modifierCategorieReclamationAction(Request $request,$ref)
    {
        $em=$this->getDoctrine()->getManager();
        $e=$em->getRepository('reclamationBundle:CategorieReclamation')->find($ref);
        $form=$this->createForm(CategorieReclamationType::class,$e);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($e);
            $em->flush();
            return $this->redirectToRoute("afficherCategorieReclamation");
        }
        return $this->render('@reclamation/view/modifierCategorieReclamation.html.twig', array('f'=>$form->createView()));
    }

    public function supprimerCategorieReclamationAction($ref)
    {
        $em=$this->getDoctrine()->getManager();
        $CategorieReclamations= $em->getRepository(CategorieReclamation::class)->find($ref);
        $em->remove($CategorieReclamations);
        $em->flush();//permet de faire le commit (lance la suppression)
        //return new Response('etud sup');
        return $this->redirectToRoute("afficherCategorieReclamation");
    }
}
