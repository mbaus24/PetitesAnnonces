<?php

namespace App\DataFixtures;



use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\Annonce;
use App\Entity\Comment;
use App\Entity\Utilisateur;
use Faker;

class AnnonceFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $query = $manager->createQuery('SELECT u FROM App\Entity\Utilisateur u');
        $utilisateur = $query->getResult();

        $faker = Faker\Factory::create("fr_FR");
        for ($i = 1; $i <= 10; $i++) {

            $annonce = new Annonce();

            $annonce->setDate($faker->dateTimeBetween('-6 months'))
                ->setAutheur($faker->randomElement($utilisateur))
                ->setDescription($faker->realText)
                ->setLocation($faker->city)
                ->setResolved($faker->boolean)
                ->setTitle($faker->realText(20))
                ->setType(mt_rand(1, 5));

            $manager->persist($annonce);
        }






    $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UtilisateurFixtures::class
        ];
    }
}
