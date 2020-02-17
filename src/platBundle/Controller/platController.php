<?php

namespace platBundle\Controller;
use platBundle\Entity\plat;

use platBundle\Form\ajoutType;
use platBundle\Form\platType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class platController extends Controller
{
    public function indexAction()
    {
        return $this->render('@plat/Default/index.html.twig');
    }
    public function ajouterPlatAction(Request $request)
    {
        /*$form=$this->createForm(ajoutType::class,$plat);
        $form=$form->handleRequest($request);//recperer les entites
        if($form->isValid())// si formulqire m3qbi wnzelt 3ala ajout yekhdem lajout
        {
            $em=$this->getDoctrine()->getManager();

var_dump($plat);
            $em->persist($plat); //ybadel fi copy mte# base donnee


            $em->flush();
            return $this->redirectToRoute('afficherPlat');

        }return $this->render("@plat/AjouterPlat.html.twig",array('f'=>$form->createView()));*/
        /*******/

        if ($request->isMethod('POST')) {
            $c = $this->getDoctrine()->getManager();
/*
            /** @var UploadedFile $file */
/*
            $file = $request->get('image');
            var_dump($file);
            $filename = $this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $plat->setImage($filename);*/
            $nom = $request->get('nom');
            $desc=$request->get('description');
            $image = $request->get('image');
            $date = $request->get('date');

$plat=new plat($nom,$desc,$image,$date);
            $c->persist($plat);
            $c->flush();
            return $this->redirectToRoute('afficherPlat');

        }
        return  $this->render("@plat/AjouterPlat.html.twig");



    }


    public  function afficherPlatAction()
    {
        $listePlat=$this->getDoctrine()->getRepository(plat::class)->findAll();
        return  $this->render("@plat/AfficherPlat.html.twig",array("liste"=>$listePlat));

    }
    public function deletePlatAction($id)
    {
        $c=$this->getDoctrine()->getManager();//responsqble pour la communication avec la base donne //getmanaager de permet d appeler les fomction remove flush.. modification base donnee
        $supp=$this->getDoctrine()->getRepository(plat::class)->find($id);//request de la suppression // getRepository t3qyet lil fonctions findby findall persist...importi men base donne
        $c->remove($supp);// lancer la remove
        $c->flush(); //elle va executer l action de la suppression commite
        return  $this->redirectToRoute("afficherPlat");
    }

    public function updateAction(Request $request,$id)
    { /*$c=$this->getDoctrine()->getManager();//responsqble pour la communication avec la base donne //getmanaager de permet d appeler les fomction remove flush..
        $plat=$this->getDoctrine()->getRepository(plat::class)->find($id);

        $form=$this->createForm(platType::class,$plat);
        $form=$form->handleRequest($request);//recperer les entites
        if($form->isSubmitted())// si formulqire m3qbi wnzelt 3ala ajout yekhdem lajout
        {
/*
            $em=$this->getDoctrine()->getManager();
            /** @var UploadedFile $file */
/*            $file = $plat->getImage();
            $filename = $this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $plat->setImage($filename);*/
            /************/
        /*    $em=$this->getDoctrine()->getManager();
            $em->persist($plat);
            $em->flush();
            $this->addFlash('success', "Personnel modifié!");

            return $this->redirectToRoute('afficherPlat');*/
        $c = $this->getDoctrine()->getManager();

        $plat=$this->getDoctrine()->getRepository(plat::class)->find($id);
        if ($request->isMethod('POST')) {

            $listePlat=$this->getDoctrine()->getRepository(plat::class)->findAll();

            $nom = $request->get('nom');
            $desc=$request->get('description');
            $image = $request->get('image');

            $date = $request->get('date');
            $plat->setImage($image);
            $plat->setNom($nom);
            $plat->setDate($date);
            $plat->setDescription($desc);
            $c->persist($plat);
            $c->flush();
            return $this->render("@plat/AfficherPlat.html.twig",array('liste'=>$listePlat));


        }

        return $this->render("@plat/modifierPlat.html.twig",array('plat'=>$plat));


        }//return $this->render("@plat/modifierPlat.html.twig",array('f'=>$form->createView()));



    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    }











