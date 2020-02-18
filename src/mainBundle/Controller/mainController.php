<?php

namespace mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class mainController extends Controller
{
    public function indexAction()
    {
        return $this->render('@main/index.html.twig');
    }
    public  function classAction()
    {        return $this->render('@main/class.html.twig');
    }
    public  function eventAction()
    {        return $this->render('@main/event.html.twig');
    }
    public  function eventdetailAction()
    {        return $this->render('@main/eventdetail.html.twig');
    }
    public  function repasAction()
    {        return $this->render('@main/cantine.html.twig');
    }
    public  function enfantAction()
    {        return $this->render('@main/enfant.html.twig');
    }

    public  function reclamationAction()
    {        return $this->render('@main/reclamation.html.twig');
    }
    public  function histreclamationAction()
{        return $this->render('@main/histreclamation.html.twig');
}
    public  function personnelAction()
    {        return $this->render('@main/personnel.html.twig');
    }
    public  function transportAction()
    {        return $this->render('@main/transport.html.twig');
    }
    public  function inscritransportAction()
    {        return $this->render('@main/inscritransport.html.twig');
    }
/**********************************back*********/
public function acceuilAdminAction()
{
    return $this->render('@main/Back/acceuilAdmin.html.twig');
}
/******************wifek*******************/
    public function listeEnfantAction()
    {
        return $this->render('@main/Back/wifek/listeEnfant.html.twig');
    }
    public function ajoutTransportAction()
    {
        return $this->render('@main/Back/wifek/AjoutLigneTransport.html.twig');
    }
    public function BusAction()
    {
        return $this->render('@main/Back/wifek/Bus.html.twig');
    }
    public function ChauffeurAction()
    {
        return $this->render('@main/Back/wifek/Chauffeur.html.twig');
    }
    public function listeParentAction()
    {
        return $this->render('@main/Back/listeParent.html.twig');
    }
    public function CategoriePersonnelAction()
    {
        return $this->render('@main/Back/aziza/CategoriePersonnel.html.twig');
    }

    public function PresonnelAction()
    {
        return $this->render('@main/Back/aziza/Personnel.html.twig');
    }
    public function AjouterCategoriePersonnelAction()
    {
        return $this->render('@main/Back/aziza/AjouterCategoriePersonnel.html.twig');
    }

    public function AfficherCategoriePersonnelAction()
    {
        return $this->render('@main/Back/aziza/AfficherCategoriePersonnel.html.twig');
    }

    public function AfficherPersonnelAction()
    {
        return $this->render('@main/Back/aziza/AfficherPersonnel.html.twig');
    }

    public function AjouterPersonnelAction()
    {
        return $this->render('@main/Back/aziza/AjouterPersonnel.html.twig');
    }

    public function ModifierPersonnelAction()
    {
        return $this->render('@main/Back/aziza/ModifierPersonnel.html.twig');
    }

    public function SupprimerPersonnelAction()
    {
        return $this->render('@main/Back/aziza/SupprimerPersonnel.html.twig');
    }


    public function CoursAction()
    {
        return $this->render('@main/Back/houria/Cours.html.twig');
    }
    public function CategorieAction()
    {
        return $this->render('@main/Back/houria/Categorie.html.twig');
    }
    public function AjouterCategorieCoursAction()
    {
        return $this->render('@main/Back/houria/AjouterCategorieCours.html.twig');
    }
    public function AfficherCategorieCoursAction()
    {
        return $this->render('@main/Back/houria/AfficherCategorieCours.html.twig');
    }
    public function ModifierCategorieCoursAction()
    {
        return $this->render('@main/Back/houria/ModifierCategorieCours.html.twig');
    }
    public function SupprimerCategorieCoursAction()
    {
        return $this->render('@main/Back/houria/SupprimerCategorieCours.html.twig');
    }
    public function AjouterEvenementAction()
    {
        return $this->render('@main/Back/houria/AjouterEvenement.html.twig');
    }
    public function ModifierEvenementAction()
    {
        return $this->render('@main/Back/houria/ModifierEvenement.html.twig');
    }
    public function SupprimerEvenemetAction()
    {
        return $this->render('@main/Back/houria/SupprimerEvenemet.html.twig');
    }



    public function AfficherAbonnementAction()
    {
        return $this->render('@main/Back/imen/AfficherAbonnement.html.twig');
    }
    public function SupprimerAbonnementAction()
    {
        return $this->render('@main/Back/imen/SupprimerAbonnement.html.twig');
    }
    public function ModifierAbonnementAction()
    {
        return $this->render('@main/Back/imen/ModifierAbonnement.html.twig');
    }
    public function SupprimerPlatAction()
    {
        return $this->render('@main/Back/imen/SupprimerPlat.html.twig');
    }
    public function AjouterPlatAction()
    {
        return $this->render('@main/Back/imen/AjouterPlat.html.twig');
    }
    public function AfficherPlatAction()
    {
        return $this->render('@main/Back/imen/AfficherPlat.html.twig');
    }


    public function AfficherReclamationAction()
    {
        return $this->render('@main/Back/ameni/AfficherReclmation.html.twig');
    }
    public function HistoriqueReclamationAction()
    {
        return $this->render('@main/Back/ameni/HistoriqueReclamation.html.twig');
    }


    public function AjouterCategorieReclamationAction()
    {
        return $this->render('@main/Back/ameni/AjouterCategorieReclamation.html.twig');
    }
    public function AfficherCategorieReclamationAction()
    {
        return $this->render('@main/Back/ameni/AfficherCategorieReclmation.html.twig');
    }
    public function ModifierCategorieReclamationtAction()
    {
        return $this->render('@main/Back/ameni/ModifierCategorieReclamation.html.twig');
    }
    public function SupprimerCategorieReclamationAction()
    {
        return $this->render('@main/Back/ameni/SupprimerCategorieReclmation.html.twig');
    }
/************************************************************************/


}
