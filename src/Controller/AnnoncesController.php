<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnoncesController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */
    public function index(): Response
    {
        return $this->render('annonces/annonces.html.twig', [
            'controller_name' => 'AnnoncesController',
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('annonces/home.html.twig', [
            'Nom' => 'Baus',
            "prenom"=>"Martin",

        ]);
    }
}

#TODO Architecture du site: / page d'acceuil; /annonces; /utilisateurs /create /profile /recherche
