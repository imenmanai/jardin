<?php


namespace JardinBundle\Controller;
use JardinBundle\Entity\Avis;
use JardinBundle\Entity\Categorie;
use JardinBundle\Entity\Score;
use JardinBundle\Form\AvisType;
use JardinBundle\Form\PersonnelType1;
use JardinBundle\Entity\Personnel;
use JardinBundle\Form\PersonnelType;
use JardinBundle\Form\ScoreType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
class PersonnelController extends Controller
{
    public function listAction(Request $request)
    {
        $ps=$this->getDoctrine()->getManager()->getRepository(Personnel::class)->findAll();
        $paginator = $this->get('knp_paginator'); //initialisation paginator
        $pagination = $paginator->paginate(
            $ps,
            $request->query->getInt('page', 1),
            6
        );
        $score = $this->getDoctrine()->getManager()->getRepository(Score::class)->findAll();
        return $this->render('@Jardin/Jardin/list.html.twig', ['pagination' => $pagination , 'score'=>$score]);
    }

    public function listFront1Action(Request $request,$categorie)
    {
        $categ1=$this->getDoctrine()->getManager()->getRepository(Categorie::class)->findBy(['type'=>$categorie]);
        $categ=$this->getDoctrine()->getManager()->getRepository(Categorie::class)->findAll();
        $ps=$this->getDoctrine()->getManager()->getRepository(Personnel::class)->findBy(['categorie'=>$categ1]);
        $avis=$this->getDoctrine()->getManager()->getRepository(Avis::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $ps,
            $request->query->getInt('page', 1), /*page number*/
            100
        );
        return $this->render('@Jardin/Jardin/listFront1.html.twig', ['pagination' => $pagination , 'categorie'=>$categorie , 'categ'=>$categ , 'avis'=>$avis]);
    }

    public function listFrontAction(Request $request)
    {
        $categ=$this->getDoctrine()->getManager()->getRepository(Categorie::class)->findAll();
        $ps=$this->getDoctrine()->getManager()->getRepository(Personnel::class)->findAll();
        $avis=$this->getDoctrine()->getManager()->getRepository(Avis::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $ps,
            $request->query->getInt('page', 1), /*page number*/
            3
        );
        return $this->render('@Jardin/Jardin/listFront.html.twig', ['pagination' => $pagination , 'categ'=>$categ , 'avis'=>$avis]);
    }

    public function pdfAction($id)
    {
        $ps=$this->getDoctrine()->getManager()->getRepository(Personnel::class)->find($id);
        $avis=$this->getDoctrine()->getManager()->getRepository(Avis::class)->findAll();
        $html = $this->renderView('@Jardin/Jardin/pdf.html.twig', array(
            'ps'  => $ps ,'avis'=>$avis
        ));

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'file.pdf'
        );
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
    public function ajouteravisAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();
        $personnel=$em->getRepository(Personnel::class)->find($id);
        $avis=new Avis();
        $form=$this->createForm(AvisType::class,$avis);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $avis->setPersonnel($personnel);
            $em->persist($avis);
            $em->flush();
            return $this->redirectToRoute('jardin_listFront');

        }

        return $this->render('@Jardin/Jardin/Avis.html.twig', array('form' => $form->createView() ,
            'personnel'=>$personnel));
    }

    public function scoreAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();
        $personnel=$em->getRepository(Personnel::class)->find($id);
        $scorep=$em->getRepository(Score::class)->findOneBy(['personnel'=>$personnel]);
        if ($scorep == null){
            $score = new Score();
            $form=$this->createForm(ScoreType::class,$score);
            $form->handleRequest($request);
            if($form->isSubmitted()) {
                $score->setPersonnel($personnel);
                $em->persist($score);
                $em->flush();
                $this->addFlash('success', "score ajouter!");
                return $this->redirectToRoute('jardin_list');
            }
            return $this->render('@Jardin/Jardin/Score.html.twig', array('form' => $form->createView() ,
                'score'=>$score));
        }else{
            $score = new Score();
            $scorep=$em->getRepository(Score::class)->findOneBy(['personnel'=>$personnel]);
            $s=$scorep->getScore();
            $score=$scorep;
            $form=$this->createForm(ScoreType::class,$score);
            $form->handleRequest($request);
            if($form->isSubmitted()) {
                $scorep->setScore($score->getScore()+$s);
                $em->persist($scorep);
                $em->flush();
                $this->addFlash('success', "score modifier!");
                return $this->redirectToRoute('jardin_list');
            }
            return $this->render('@Jardin/Jardin/Score.html.twig', array('form' => $form->createView() ,
                'score'=>$score));
        }
    }

}