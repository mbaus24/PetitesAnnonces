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
        return $this->render('home.html.twig', [
            'Nom' => 'Baus',
            "prenom"=>"Martin",

        ]);

    }

    /**
     * @Route("/create", name="create")
     */
    public function create(): Response
    {
        return $this->render('annonces/create.html.twig', [
            'Nom' => 'Baus',
            "prenom"=>"Martin",

        ]);

    }

    /**
     * @Route("/users", name="users")
     */
    public function users(): Response
    {
        return $this->render('annonces/users.html.twig', [
            'Nom' => 'Baus',
            "prenom"=>"Martin",

        ]);

    }

    /**
     * @Route("/search", name="search")
     */
    public function search(): Response
    {
        return $this->render('annonces/search.html.twig', [
            'Nom' => 'Baus',
            "prenom"=>"Martin",

        ]);

    }
}

#TODO Reorganiser Architecture du site: / page d'acceuil; /annonces; /utilisateurs /create /profile /recherche
