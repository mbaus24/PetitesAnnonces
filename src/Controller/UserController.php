<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\UserRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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




    /**
     * @Route("/users/{user_id}", name="users_show")
     * @ParamConverter("user", options={"id" = "user_id"})
     */
    public function show(User $user){


        return $this->render('user/show.html.twig', [
            "user" => $user,
            "ads" => $this->getDoctrine()->getRepository(Ad::class)->findAll(),

    ]);

}
}




