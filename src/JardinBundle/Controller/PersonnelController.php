<?php


namespace JardinBundle\Controller;




use JardinBundle\Form\PersonnelType1;
use JardinBundle\Entity\Personnel;
use JardinBundle\Form\PersonnelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class PersonnelController extends Controller
{
    public function listAction()
    {
        $formations=$this->getDoctrine()->getRepository(Personnel::class)->findAll();
        return $this->render('@Jardin/Jardin/list.html.twig', array('formations' => $formations));
    }
    public function addAction(Request $request)
    {
        $formation = new Personnel();
        $form = $this->createForm(PersonnelType::class, $formation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);//persister les donner dans la base de donnee
            $em->flush();//tlansi kif el commit
            $this->addFlash('success', "Personnel ajouté!");
            return $this->redirectToRoute('jardin_list');
        }
        return $this->render('@Jardin/Jardin/add.html.twig', array('form' => $form->createView()));


    }
    public function supprimeAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $projet=$em->getRepository(Personnel::class)->find($id);//les deux lignes recuperation du categorie a supprimer
        $em->remove($projet);
        $em->flush();//les deux lignes la supprission
        $this->addFlash('success', "Personnel supprimé avec succes!");
        return $this->redirectToRoute('jardin_list');
    }
    public function modifieAction(Request $request,$id){

        $club= new Personnel();
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Personnel::class)->find($id);
        $form=$this->createForm(PersonnelType1::class,$club);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', "Personnel modifié!");
            return $this->redirectToRoute('jardin_list');
        }

        return $this->render('@Jardin/Jardin/modifie.html.twig', array('form' => $form->createView()));




    }
}