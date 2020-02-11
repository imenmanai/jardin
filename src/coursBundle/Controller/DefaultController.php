<?php

namespace coursBundle\Controller;

use coursBundle\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function AjouterCoursBAction($id,Request $request)
    {
        $c=$this->getDoctrine()->getManager();//responsqble pour la communication avec la base donne //getmanaager de permet d appeler les fomction remove flush..
        $pass=$this->getDoctrine()->getRepository(Cours::class)->find($id);
        if($request->isMethod('POST')) {
            $ref = $request->get('ref');
            $pass->setNbe_bagage($pass->getNbe_bagage()+$ref);
            $pass->setTotal_frais($pass->getTotal_frais()+(50*$pass->getNbe_bagage())) ;
            $c->persist($pass);
            $c->flush();
            return $this->redirectToRoute('afficher');
        }return $this->render("@GestionVol/Default/bagage.html.twig");
    }
    public function ajoutercatAction(){
        return $this->render('@cours/view/ajouterCategorie.html.twig');
    }
}
