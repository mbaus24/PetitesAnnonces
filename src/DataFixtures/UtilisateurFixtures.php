<?php

namespace App\DataFixtures;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Utilisateur;
require_once 'vendor/autoload.php';



class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");
        for($i=1;$i<=10;$i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setPrenom(" $faker->firstName");
            $utilisateur->setNom(" $faker->lastName");

            $utilisateur->setBio(" $faker->text();");
            $utilisateur->setEmail(" $faker->safeEmail");
            $utilisateur->setPassword(" $faker->password");
            $utilisateur->setUsername(" $faker->userName");





            $manager->persist($utilisateur);
        }



        $manager->flush();
    }
}

#TODO date naissance, photo profil, ANNONCES,
