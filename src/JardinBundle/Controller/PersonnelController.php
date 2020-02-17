<?php


namespace JardinBundle\Controller;





use JardinBundle\Form\PersonnelType1;
use JardinBundle\Entity\Personnel;
use JardinBundle\Form\PersonnelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class PersonnelController extends Controller
{
    public function listAction()
    {
        $formations=$this->getDoctrine()->getRepository(Personnel::class)->findAll();
        return $this->render('@Jardin/Jardin/list.html.twig', array('formations' => $formations));
    }
    public function listFrontAction()
    {
        $formations=$this->getDoctrine()->getRepository(Personnel::class)->findAll();
        return $this->render('@Jardin/Jardin/listFront.html.twig', array('formations' => $formations));
    }
    public function addAction(Request $request)
    {
        $formation = new Personnel();
        $form = $this->createForm(PersonnelType::class, $formation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            /** @var UploadedFile $file */
            $file = $formation->getImage();
            $filename = $this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $formation->setImage($filename);
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
            /** @var UploadedFile $file */
            $file = $club->getImage();
            $filename = $this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $club->setImage($filename);
            $em->flush();
            $this->addFlash('success', "Personnel modifié!");
            return $this->redirectToRoute('jardin_list');
        }

        return $this->render('@Jardin/Jardin/modifie.html.twig', array('form' => $form->createView()));




    }

    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
    public function searchAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $requestString= $request->get('q');
        $posts=$em->getRepository('JardinBundle:Personnel')->findEntitiesByString($requestString);
        if(!$posts){
        $result['posts']['error']='Post not found';

        }
        else {
            $result['posts']=$this->getRealEntities($posts);
    }



return new Response(json_encode($result));
}

    public function getRealEntities($posts)
    { foreach ($posts as $posts){
        $realEntities[$posts->getId()]=[$posts->getNom(),$posts->getPrenom()];
    }
    return $realEntities;
    }
}