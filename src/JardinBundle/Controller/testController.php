<?php

namespace JardinBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use JardinBundle\Entity\Personnel;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class testController extends Controller
{

    public function listAction( Request $request)
    {
        $ps=$this->getDoctrine()->getManager()->getRepository(Personnel::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $ps, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        // parameters to template
        return $this->render('@Jardin/Jardin/test.html.twig', ['pagination' => $pagination]);
    }
}
