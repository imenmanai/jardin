<?php

namespace reclamationBundle\Controller;

use reclamationBundle\Entity\reclamation;
use reclamationBundle\Form\reclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ForumBundle\Entity\Reponse;


class reclamationController extends Controller
{
    public function indexAction()
    {
        return $this->render('reclamationBundle:Default:index.html.twig');
    }

    public function afficherReclamationAction()
    {
        $reclamations=$this->getDoctrine()
            ->getRepository(reclamation::class)->findAll();
        return $this->render('@reclamation/view/afficherReclamation.html.twig',array('reclamations'=>$reclamations));
    }
    public function ajouterReclamationAction(Request $request)
    {
        $user = $this->getUser();
        $reclamations =new reclamation();
        $form =$this->createForm(reclamationType::class, $reclamations);
        $form =$form->handleRequest($request);
        if ($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $reclamations->setIdParent($user);
            $em->persist($reclamations);
            $em->flush();
            return $this->redirectToRoute("afficherReclamation");
        }
        return $this->render('@reclamation/view/ajouterReclamation.html.twig', array('f'=>$form->createView()));
    }
    public function modifierReclamationAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $e=$em->getRepository('reclamationBundle:reclamation')->find($id);
        $form=$this->createForm(reclamationType::class,$e);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($e);
            $em->flush();
            return $this->redirectToRoute("afficherReclamation");
        }
        return $this->render('@reclamation/view/modifierReclamation.html.twig', array('f'=>$form->createView()));
    }
    public function supprimerReclamationAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $reclamations= $em->getRepository(reclamation::class)->find($id);
        $em->remove($reclamations);
        $em->flush();//permet de faire le commit (lance la suppression)
        //return new Response('etud sup');
        return $this->redirectToRoute("afficherReclamation");
    }


    public function afficherListeAction()
    {
        $reclamations=$this->getDoctrine()
            ->getRepository(reclamation::class)->findAll();
        return $this->render('@reclamation/view/afficherListe.html.twig',array('reclamations'=>$reclamations));
    }

    public function afficherDetailleAction(Request $request, $id)
    {
        $reclamations=$this->getDoctrine()
            ->getRepository(reclamation::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->persist($reclamations);
        $em->flush();
        return $this->render('@reclamation/view/afficherDetaille.html.twig',array('reclamations'=>$reclamations));

        $Reponse=new Reponse();
        $form =$this->createForm(reclamationType::class, $Reponse);
        $form =$form->handleRequest($request);
        if ($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($Reponse);
            $em->flush();
            return $this->redirectToRoute("afficherReclamation");
        }
        return $this->render('@reclamation/view/afficherDetaille.html.twig', array('f'=>$form->createView()));
    }
}
