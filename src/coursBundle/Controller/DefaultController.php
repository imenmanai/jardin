<?php

namespace coursBundle\Controller;

use coursBundle\Entity\Cours;
use coursBundle\Entity\Matiere;
use coursBundle\Form\CoursmodifType;
use coursBundle\Form\CoursType;
use coursBundle\Form\MatieremodifierType;
use coursBundle\Form\MatiereType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('coursBundle:Default:index.html.twig');
    }
    public function AfficherCoursAction()
    {
        $courss=$this->getDoctrine()->getRepository(Cours::class)->findAll();

        return $this->render('@cours/view/AfficherCours.html.twig',array('cours'=>$courss));

    }

    public function ajoutercatAction(Request $request){
        $matiere= new Matiere();
        $form=$this->createForm(MatiereType::class,$matiere);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($matiere);//persister les donner dans la base de donnee
            $em->flush();//tlansi kif el commit
            return $this->redirectToRoute('Affichcatcours');
        }
        return $this->render('@cours/view/ajouterCategorie.html.twig', array('form' => $form->createView()));

    }
    public function AjouterCoursAction(Request $request){
        $cours= new Cours();
        $form=$this->createForm(CoursType::class,$cours);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($cours);
            $em->flush();
            return $this->redirectToRoute('AfficherCours');
        }
        return $this->render('@cours/view/ajouterCours.html.twig', array('form' => $form->createView()));

    }
    public function affichercategorieAction(){

        $matieres=$this->getDoctrine()->getRepository(Matiere::class)->findAll();
        return $this->render('@cours/view/AfficherCategorie.html.twig',array('matiere'=>$matieres));
    }
    public function supprimercategorieAction(Request $request,$id){

        $model=$this->getDoctrine()->getManager();
        $modeleasupp=$this->getDoctrine()->getRepository(Matiere::class)->find($id);
        $model->remove($modeleasupp);
        $model->flush();
        return $this->redirectToRoute("Affichcatcours");
    }
    public function supprimercoursAction(Request $request,$id){
        $cours=$this->getDoctrine()->getManager();
        $coursasupp=$this->getDoctrine()->getRepository(Cours::class)->find($id);
        $cours->remove($coursasupp);
        $cours->flush();
        return $this->redirectToRoute("AfficherCours");
    }
    public function modifiercoursAction(Request $request,$id){
        $cours= new Cours();
        $em=$this->getDoctrine()->getManager();
        $cours=$em->getRepository(Cours::class)->find($id);
        $form=$this->createForm(CoursmodifType::class,$cours);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('AfficherCours');
        }

        return $this->render('@cours/view/modifiercours.html.twig', array('form' => $form->createView()));

    }
    public function modifiermatiereAction(Request $request,$id){
        $cours= new Matiere();
        $em=$this->getDoctrine()->getManager();
        $cours=$em->getRepository(Matiere::class)->find($id);
        $form=$this->createForm(MatieremodifierType::class,$cours);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('Affichcatcours');
        }

        return $this->render('@cours/view/modifierCategorie.html.twig', array('form' => $form->createView()));

    }
    public function afficherfrontcoursAction(){

        $courss=$this->getDoctrine()->getRepository(Cours::class)->findAll();
        return $this->render('@cours/view/afficherfrontcours.html.twig',array('cours'=>$courss));
    }
}
