<?php

namespace App\Controller;

use App\Entity\Ad;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function users(): Response
    {
        return $this->render('user/index.html.twig', [
            "users" => $this->getDoctrine()->getRepository(User::class)->findAll()

        ]);

    }
}



