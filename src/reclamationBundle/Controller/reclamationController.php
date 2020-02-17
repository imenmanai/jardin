<?php

namespace reclamationBundle\Controller;

use reclamationBundle\Entity\reclamation;
use reclamationBundle\Form\rechercherReclamationType;
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
        //$user = $this->container->get('security.token_storage')->getToken()->getUser();
        //$id=$user->getid();
        $reclamations=$this->getDoctrine()->getRepository(reclamation::class)->findAll();

        //$reclamations=$this->getDoctrine()->getRepository(reclamation::class)->findOneBy(['id'=>$id]);
        return $this->render('@reclamation/view/afficherReclamation.html.twig',array('reclamations'=>$reclamations));
    }
    public function ajouterReclamationAction(Request $request)
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            throw new \LogicException("Vous devez posseder un compte",1);
        }
        $user = $this->getUser();
        $reclamations =new reclamation();
        $form =$this->createForm(reclamationType::class, $reclamations);
        $form =$form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $reclamations->setIdParent($user);
            $em->persist($reclamations);
            $em->flush();
            return $this->redirectToRoute("afficherReclamation");
        }
        return $this->render('@reclamation/view/ajouterReclamation.html.twig', array('form'=>$form->createView()));
    }
    public function modifierReclamationAction(Request $request,$id)
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            throw new \LogicException("Vous devez posseder un compte",1);
        }
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
        if(!$this->isGranted('ROLE_USER'))
        {
            throw new \LogicException("Vous devez posseder un compte",1);
        }
        $em=$this->getDoctrine()->getManager();
        $reclamations= $em->getRepository(reclamation::class)->find($id);
        $em->remove($reclamations);
        $em->flush();//permet de faire le commit (lance la suppression)
        //return new Response('etud sup');
        return $this->redirectToRoute("afficherReclamation");
    }


    public function afficherDetailleAction(Request $request, $id)
    {
        if(!$this->isGranted('ROLE_USER'))
        {
            throw new \LogicException("Vous devez posseder un compte",1);
        }
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


    public function rechercherReclamationAction(Request $request)
    {
        $reclamation=new reclamation();
        $form=$this->createForm(rechercherReclamationType::class,$reclamation);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $reclamation=$this->getDoctrine()->getRepository(reclamation::class)
                ->findBy(array('CategorieReclamation'=>$reclamation->getCategorieReclamation()));}
        else {
            $reclamation=$this->getDoctrine()->getRepository(reclamation::class)->findAll();
        }
        return $this->render('@reclamation/view/rechercherReclamation.html.twig',array("form"=>$form->createView(),'reclamations'=>$reclamation));
    }

    public function afficherListeAction()
    {
        $reclamation=$this->getDoctrine()
            ->getRepository(reclamation::class)->findAll();
        return $this->render('@reclamation/view/afficherListe.html.twig',array('reclamations'=>$reclamation));
    }

}
