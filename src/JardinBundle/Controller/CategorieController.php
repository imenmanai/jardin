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
            $test = true;
            $clubs=$this->getDoctrine()->getRepository(Categorie::class)->findAll();

            foreach ($clubs as $value) {
                if($value->getType() == $club->getType())
                {
                    $test=false;
                }
            }
            $em=$this->getDoctrine()->getManager();
            if($test) {
                $em->persist($club);//persister les donner dans la base de donnee
                $em->flush();//tlansi kif el commit
                $this->addFlash('success', "Categorie ajouté!");
                return $this->redirectToRoute('jardin_listc');
            }
        }
        return $this->render('@Jardin/Jardin/addc.html.twig', array('form' => $form->createView()));


    }
    public function supprimecAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $projet=$em->getRepository(Categorie::class)->find($id);//les deux lignes recuperation du categorie a supprimer
        $em->remove($projet);
        $em->flush();//les deux lignes la supprission
        $this->addFlash('success', "catégorie supprimé avec succes!");
        return $this->redirectToRoute('jardin_listc');
    }
}