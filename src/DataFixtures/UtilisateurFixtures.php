<?php

namespace App\DataFixtures;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Utilisateur;


function conversion(string $nom): String
{
    return strtolower(strtr(iconv("UTF-8", "ASCII//TRANSLIT", $nom), ' ', '-'));
}

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");
        for($i=1;$i<=10;$i++) {
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();


            $utilisateur = new Utilisateur();
            $utilisateur->setPrenom($firstName);
            $utilisateur->setNom(" $lastName");

            $utilisateur->setBio(" $faker->text();");

            $utilisateur->setPassword(" $faker->password");
            $utilisateur->setRole(($i%3 +1)."A");
            $utilisateur->setDateNaissance("$faker->date");


            $firstName = conversion($firstName);
            $lastName = conversion($lastName);

            $utilisateur->setEmail("{$firstName[0]}{$lastName}@centrale-marseille.fr");
            $utilisateur->setUsername("{$firstName[0]}{$lastName}");







            $manager->persist($utilisateur);
        }



        $manager->flush();
    }
}

#TODO date naissance, photo profil, ANNONCES, commentaires
