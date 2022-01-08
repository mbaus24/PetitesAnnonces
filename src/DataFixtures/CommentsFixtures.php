<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use App\Entity\Comment;
use App\Entity\Utilisateur;
use Faker;

class CommentsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $utilisateur = $manager->getRepository(Utilisateur::class)->findAll();
        $annonce = $manager->getRepository(Annonce::class)->findAll();
        $faker = Faker\Factory::create("fr_FR");
        for ($i = 1; $i <= 10; $i++) {
            $comment = new Comment();
            $comment->setAuthor($utilisateur[rand(0,sizeof($utilisateur)-1)])
                    ->setDate(new \DateTime())
                    ->setAnnonce($annonce[rand(0,sizeof($annonce)-1)])
                    ->setContent($faker->text);


            $manager->persist($comment);
        }

        $manager->flush();
    }
}
