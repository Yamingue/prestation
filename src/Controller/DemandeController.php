<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Entity\DemandeR;
use App\Form\DemandeType;
use App\Form\DemandeRType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/demande")
 */
class DemandeController extends AbstractController
{
    /**
     * @Route("/network", name="r_demande")
     */
    public function index(Request $req)
    {
        $r= new DemandeR();
        $user = $this->getUser();
        $r->setUser($user);
        $form= $this->createForm(DemandeRType::class,$r);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            //dd($r);
            $em= $this->getDoctrine()->getManager();
            $em->persist($r);
            $em->flush(); 
            return $this->redirectToRoute('index');
        }
        return $this->render('demande/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/soft", name="s_demande")
     */
    public function soft(Request $req)
    {
        $r= new Demande();
        $user = $this->getUser();
        $r->setUser($user);
        $form= $this->createForm(DemandeType::class,$r);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            //dd($r);
            $em= $this->getDoctrine()->getManager();
            $em->persist($r);
            $em->flush(); 
            return $this->redirectToRoute('index');
        }
        return $this->render('demande/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/hard", name="h_demande")
     */
    public function hard(Request $req)
    {
        $r= new Demande();
        $user = $this->getUser();
        $r->setUser($user);
        $form= $this->createForm(DemandeType::class,$r);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
           // dd($r);
            $em= $this->getDoctrine()->getManager();
            $em->persist($r);
            $em->flush(); 
            return $this->redirectToRoute('index');
        }
        return $this->render('demande/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
