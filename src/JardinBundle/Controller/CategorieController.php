<?php


namespace JardinBundle\Controller;



use JardinBundle\Entity\Categorie;

use JardinBundle\Form\CategorieType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller

{
    public function listcAction()
    {
        $clubs=$this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render('@Jardin/Jardin/listc.html.twig', array('clubs' => $clubs));
    }


    public function addcAction(Request $request){
        $club= new Categorie();
        $form=$this->createForm(CategorieType::class,$club);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($club);//persister les donner dans la base de donnee
            $em->flush();//tlansi kif el commit
            return $this->redirectToRoute('jardin_listc');
        }
        return $this->render('@Jardin/Jardin/addc.html.twig', array('form' => $form->createView()));


    }
}