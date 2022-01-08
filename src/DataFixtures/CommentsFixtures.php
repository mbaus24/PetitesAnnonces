<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Annonce;
use App\Entity\Comment;
use App\Entity\Utilisateur;
use Faker;

class CommentsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $query = $manager->createQuery('SELECT u FROM App\Entity\Utilisateur u');
        $utilisateur = $query->getResult();

        $query = $manager->createQuery('SELECT u FROM App\Entity\Annonce u');
        $annonce = $query->getResult();

        $faker = Faker\Factory::create("fr_FR");
        for ($i = 1; $i <= 10; $i++) {
            $comment = new Comment();
            $comment->setAuthor($faker->randomElement($utilisateur))
                    ->setDate(new \DateTime())
                    ->setAnnonce($faker->randomElement($annonce))
                    ->setContent($faker->text);


            $manager->persist($comment);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return[UtilisateurFixtures::class,AnnonceFixture::class];

    }
}
