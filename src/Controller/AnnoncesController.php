<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Comment;
use App\Entity\User;
use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AnnoncesController extends AbstractController
{
    /**
     * @Route("/ads", name="ads")
     */
    public function index(): Response
    {
        return $this->render('annonces/annonces.html.twig', [
            "ads" => $this->getDoctrine()->getRepository(Ad::class)->findAll()
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
     * @Route("/search", name="search")
     */
    public function search(): Response
    {
        return $this->render('annonces/search.html.twig', [
            'Nom' => 'Baus',
            "prenom"=>"Martin",

        ]);

    }


    /**
     * @Route("/ads/{ad_id}", name="ads_show")
     * @ParamConverter("ad", options={"id" = "ad_id"})
     * @ParamConverter("users", options={"id" = "user_id"})
     */
    public function show(Ad $ad){


        return $this->render('annonces/show.html.twig', [
            "ad" => $ad,
            "users" => $this->getDoctrine()->getRepository(User::class)->findAll(),
            "comments" => $this->getDoctrine()->getRepository(Comment::class)->findAll(),

        ]);

    }
}

#TODO Reorganiser Architecture du site: / page d'acceuil; /annonces; /utilisateurs /create /profile /recherche
