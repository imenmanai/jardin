<?php

namespace platBundle\Controller;
use platBundle\Entity\plat;

use platBundle\Form\platType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class platController extends Controller
{
    public function indexAction()
    {
        return $this->render('@plat/Default/index.html.twig');
    }
    public function ajouterPlatAction(Request $request)
    {  $plat= new plat();
        $form=$this->createForm(platType::class,$plat);
        $form=$form->handleRequest($request);//recperer les entites
        if($form->isValid())// si formulqire m3qbi wnzelt 3ala ajout yekhdem lajout
        {$em=$this->getDoctrine()->getManager();
            $em->persist($plat); //ybadel fi copy mte# base donnee
            $em->flush();
            return $this->redirectToRoute('afficherPlat');

        }return $this->render("@plat/AjouterPlat.html.twig",array('f'=>$form->createView()));
        /*******/


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
    { $c=$this->getDoctrine()->getManager();//responsqble pour la communication avec la base donne //getmanaager de permet d appeler les fomction remove flush..
        $plat=$this->getDoctrine()->getRepository(plat::class)->find($id);

        $form=$this->createForm(platType::class,$plat);
        $form=$form->handleRequest($request);//recperer les entites
        if($form->isSubmitted())// si formulqire m3qbi wnzelt 3ala ajout yekhdem lajout
        {$em=$this->getDoctrine()->getManager();
            $em->persist($plat);
            $em->flush();
            return $this->redirectToRoute('afficherPlat');

        }return $this->render("@plat/modifierPlat.html.twig",array('f'=>$form->createView()));

        }

    }











