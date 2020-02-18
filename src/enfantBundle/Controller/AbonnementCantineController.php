<?php

namespace enfantBundle\Controller;

use enfantBundle\Entity\Abonnec;
use enfantBundle\Entity\Enfant;
use enfantBundle\Entity\Menu;
use enfantBundle\Form\AbonneType;
use platBundle\Entity\plat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Tests\Compiler\E;
use Symfony\Component\HttpFoundation\Request;

class AbonnementCantineController extends Controller
{
    public function indexAction()
    {
        return $this->render('enfantBundle:Default:index.html.twig');
    }
public  function afficherAbonAction()
{
    $abon=$this->getDoctrine()->getRepository(Abonnec::class)->findAll();
    return  $this->render("@enfant/abonnementCantine/afficher.html.twig",array("abonne"=>$abon));

}

    public function deleteAbonAction($id)
    {
        $c=$this->getDoctrine()->getManager();//responsqble pour la communication avec la base donne //getmanaager de permet d appeler les fomction remove flush.. modification base donnee
        $supp=$this->getDoctrine()->getRepository(Abonnec::class)->find($id);//request de la suppression // getRepository t3qyet lil fonctions findby findall persist...importi men base donne
        $c->remove($supp);// lancer la remove
        $c->flush(); //elle va executer l action de la suppression commite
        return  $this->redirectToRoute("abonnec");
    }

    /*******front************/
    public  function inscriAbonAction(Request $request)
    {                            $user = $this->getUser();
        $c = $this->getDoctrine()->getManager();
        if ($request->isMethod('POST')) {
            $type = $request->get('type');

            $dateDebut = $request->get('dateDebut');
            $dateFin = $request->get('dateFin');
            $abon = new Abonnec($type, $dateDebut, $dateFin);
            $abon->setIdParent($user);
            $c->persist($abon);
            $c->flush();
            return $this->render("@enfant/abonnementCantine/inscriptionCantine.html.twig");

        }
        return  $this->render("@enfant/abonnementCantine/inscriptionCantine.html.twig");


    }

    public  function modifierAbonAction(Request $request)
    {   $user=$this->getUser();
        $c = $this->getDoctrine()->getManager();

        $abonn=$this->getDoctrine()->getRepository(Abonnec::class)->rechercheAbon($user);
if(!empty($abonn))
{
        if ($request->isMethod('POST')) {
            $type = $request->get('type');

            $dateFin = $request->get('dateFin');
   $abonn[0]->setType($type);
   $abonn[0]->setDateF($dateFin);
            $c->persist($abonn[0]);
            $c->flush();
            return $this->render("@enfant/abonnementCantine/modifierAbonnement.html.twig",array('abon'=>$abonn[0]));

        }
        return  $this->render("@enfant/abonnementCantine/modifierAbonnement.html.twig",array('abon'=>$abonn[0]));
} else
    return  $this->render("@enfant/abonnementCantine/modifier1Abonnement.html.twig");

    }
    public  function MenuAction()
    { $listePlat=$this->getDoctrine()->getRepository(plat::class)->findAll();
        return  $this->render("@enfant/abonnementCantine/Menu.html.twig",array("liste"=>$listePlat));

    }
    public function afficher1Action()
    {
        return $this->render("@enfant/abonnementCantine/afficher1.html.twig");
    }

    public function modifierEtatAction(Request $request, $id)
    { /*   $abon=$this->getDoctrine()->getRepository(Abonnec::class)->findAll();


        $c = $this->getDoctrine()->getManager();
        $user=$this->getDoctrine()->getRepository(Abonnec::class)->find($id);
        var_dump($user);
        if ($request->isMethod('POST')) {
            $etat=$request->get('etat');
            $user->setEtat($etat);
            $c->persist($user);
            $c->flush();

            return $this->render("@enfant/abonnementCantine/afficher.html.twig",array("abonne"=>$abon));

        }
        return $this->render("@enfant/abonnementCantine/afficher1.html.twig",array("abonne"=>$abon));

        */
        /******************/
        $abon=$this->getDoctrine()->getRepository(Abonnec::class)->findAll();


        $c = $this->getDoctrine()->getManager();
        $user=$this->getDoctrine()->getRepository(Abonnec::class)->find($id);
        $form=$this->createForm(AbonneType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('abonnec');
        }
        return $this->render('@enfant/abonnementCantine/afficher1.html.twig', array("abonne"=>$abon,'form' => $form->createView()));
    }

    function detailMenuAction($id){
        $user=$this->getDoctrine()->getRepository(Abonnec::class)->find($id);
        return $this->render('@enfant/abonnementCantine/detailMenu.html.twig', array("plat"=>$user));



    }
function  affecterPlatAction(Request $request)
{/*
$c=$this->getDoctrine()->getManager();
    $u=$this->getUser();

var_dump($u);

    $enfants=$this->getDoctrine()->getRepository(Abonnec::class)->enfant($u);


    if ($request->isMethod('POST')) {


$menu =new Menu(new \DateTime('now'),$enfants[0]);
var_dump($menu);
$c->persist($menu);
$c->flush();
        return $this->render('@enfant/abonnementCantine/detailMenu.html',array('id'=>$menu->getId()));

    }
    else      return $this->render('@enfant/abonnementCantine/Menu.html.twig');
*/
    }



}




