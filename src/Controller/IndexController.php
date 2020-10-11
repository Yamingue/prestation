<?php

namespace App\Controller;

use App\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        // $s= new Service();
        // $s->setNom('SoftWare');
        // $em= $this->getDoctrine()->getManager();
        // $em->persist($s);
        // $em->flush();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
