<?php

namespace enfantBundle\Controller;

use enfantBundle\Entity\Abonnec;
use enfantBundle\Entity\Enfant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
var_dump($user);
        $c = $this->getDoctrine()->getManager();
        if ($request->isMethod('POST')) {
            $type = $request->get('type');

            $dateDebut = $request->get('dateDebut');
            $dateFin = $request->get('dateFin');
            $abon = new Abonnec($type, $dateDebut, $dateFin);
            $abon->setIdParent($user);
            $c->persist($abon);
            $c->flush();
            return $this->render("@enfant/abonnementCantine/index.html.twig");

        }
        return  $this->render("@enfant/abonnementCantine/inscriptionCantine.html.twig");


    }}
