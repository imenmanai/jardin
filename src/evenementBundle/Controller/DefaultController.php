<?php

namespace evenementBundle\Controller;

use evenementBundle\Entity\Event;
use evenementBundle\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function affichereventAction()
    {
        $courss=$this->getDoctrine()->getRepository(Event::class)->findAll();

        return $this->render('@evenement/view/listeevent.html.twig',array('cours'=>$courss));

    }
    public function ajeventAction(request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /** @var UploadedFile $file */
            $file = $event->getImage();
            $filename = $this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $event->setImage($filename);
            $em->persist($event);
            $em->flush();/*
            $message = new \DocDocDoc\NexmoBundle\Message\Simple("Coccinelle", "21656346606", "Bonjour mdme/msr on a ajouter un nouveau evenement consulter notre site pour plus d information ");
            $nexmoResponse = $this->container->get('doc_doc_doc_nexmo')->send($message);*/
            return $this->redirectToRoute('afficherevent');
        }
        return $this->render('@evenement/view/ajouterevent.html.twig', array('form' => $form->createView()));
    }
    public function supprimereventAction(Request $request,$id){

        $model=$this->getDoctrine()->getManager();
        $modeleasupp=$this->getDoctrine()->getRepository(Event::class)->find($id);
        $model->remove($modeleasupp);
        $model->flush();
        return $this->redirectToRoute("afficherevent");
    }
    public function modifiereventAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Event::class)->find($id);
        $form = $this->createForm(EventType::class, $event);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $file = $event->getImage();
            $filename = $this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $event->setImage($filename);
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('afficherevent');
        }

        return $this->render('@evenement/view/modifierevent.html.twig', array('form' => $form->createView()));

    }
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    public function affichfrontAction(){

        $courss=$this->getDoctrine()->getRepository(Event::class)->findEvent();

        return $this->render('@evenement/view/afficherfrontevent.html.twig',array('cours'=>$courss));
    }
    public function affichfrontpasseeAction(){

        $courss=$this->getDoctrine()->getRepository(Event::class)->findAll();

        return $this->render('@evenement/view/afficherfronteventpassee.html.twig',array('cours'=>$courss));
    }
}
