<?php

namespace evenementBundle\Controller;

use evenementBundle\Entity\Event;
use mainBundle\Entity\User;
use evenementBundle\Entity\Participation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use UserBundle\Entity\User;

class ParticipationController extends Controller
{
    public function UserAfficheParticipationAction()
    {
        $test="current";
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Participation::class)->findMyParticiaptions($this->getUser()->getId());
        return $this->render('@evenement/view/UserAfficheParticipation.html.twig', array('participations' => $tab,'test'=>$test));
    }


    public function ajoutParticipationAction($id)
    {
        $participation=new Participation();
        $em=$this->getDoctrine()->getManager();
        $event=$em->getRepository(Event::class)->find($id);
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        $participation->setIduser($user);
        $participation->setIdevent($event);
        $tab = $em->getRepository(Participation::class)->findParticiaptionsEvent($event->getId(),$user->getId());
        if(empty($tab)){
            $event->setnbpart(($event->getnbpart())-1);
            $em->persist($participation);
            $em->flush();
        }
        return $this->redirectToRoute('UserAfficheParticipation');
    }


    public function UserDeleteParticipationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $participation = $em->getRepository(Participation::class)->find($id);
        $event=$em->getRepository(Event::class)->find($participation->getIdevent());
        $event->setNbpart(($event->getNbpart())+1);
        $em->remove($participation);
        $em->flush();

        return $this->redirectToRoute('UserAfficheParticipation');

    }

    public function lateParticipationAction(){
        $test="late";
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Participation::class)->findLateParticipation($this->getUser()->getId());
        return $this->render('@PlanEvent/Participation/UserAfficheParticipation.html.twig', array('participations' => $tab,'test'=>$test));
    }
}
