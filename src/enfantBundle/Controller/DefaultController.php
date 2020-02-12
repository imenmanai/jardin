<?php

namespace enfantBundle\Controller;

use enfantBundle\Entity\Bus;
use enfantBundle\Entity\Enfant;
use enfantBundle\Form\BusType;

use enfantBundle\Form\EnfantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function ajouterBusAction(Request $request)
    {
        $bus = new Bus();
        $form = $this->createForm(BusType::class, $bus);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bus);//persister les donner dans la base de donnee
            $em->flush();//tlansi kif el commit
            return $this->redirectToRoute('afficher_Bus');
        }
        return $this->render('@enfant/Default/ajouterBus.html.twig', array('form' => $form->createView()));
    }

    public function supprimerBusAction($id){
        $em=$this->getDoctrine()->getManager();
        $bus=$em->getRepository(Bus::class)->find($id);
        $em->remove($bus);
        $em->flush();
        return $this->redirectToRoute("afficher_Bus");
    }

    public function modifierBusAction(Request $request,$id){

        $bus= new Bus();
        $em=$this->getDoctrine()->getManager();
        $bus=$em->getRepository(Bus::class)->find($id);
        $form=$this->createForm(BusType::class,$bus);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficher_Bus');
        }
        return $this->render('@enfant/Default/modifierBus.html.twig', array('form' => $form->createView()));

    }

    public function ajouterEnfantAction(Request $request)
    {
        $enfant = new Enfant();
        $form = $this->createForm(EnfantType::class, $enfant);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);//persister les donner dans la base de donnee
            $em->flush();//tlansi kif el commit
            return $this->redirectToRoute('ajouter_Enfant');
        }
        return $this->render('@enfant/Default/ajouterEnfant.html.twig', array('form' => $form->createView()));
    }
    public function afficherEnfantAction()
    {
        $enf=$this->getDoctrine()->getRepository(Enfant::class)->findAll();
        return $this->render('@enfant/Default/afficherEnfant.html.twig',array('enf'=>$enf));
    }
    public function modifierEnfantAction(Request $request,$id){

        $bus= new Enfant();
        $em=$this->getDoctrine()->getManager();
        $enf=$em->getRepository(Enfant::class)->find($id);
        $form=$this->createForm(EnfantType::class,$enf);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficher_Enfant');
        }
        return $this->render('@enfant/Default/modifierEnfant.html.twig', array('form' => $form->createView()));

    }

    public function supprimerEnfantAction($id){
        $em=$this->getDoctrine()->getManager();
        $enf=$em->getRepository(Enfant::class)->find($id);
        $em->remove($enf);
        $em->flush();
        return $this->redirectToRoute("afficher_Enfant");
    }

}
