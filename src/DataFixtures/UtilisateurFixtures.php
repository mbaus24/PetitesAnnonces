<?php

namespace App\DataFixtures;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\Annonce;
use App\Entity\Comment;
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
        for($i=1;$i<=50;$i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;


            $utilisateur = new Utilisateur();
            $utilisateur->setPrenom($firstName);
            $utilisateur->setNom(" $lastName");

            $utilisateur->setBio(" $faker->text();");

            $utilisateur->setPassword(" $faker->password");
            $utilisateur->setPromo((mt_rand(1,4))."A");
            $utilisateur->setDateNaissance("$faker->date");


            $firstName = conversion($firstName);
            $lastName = conversion($lastName);

            $utilisateur->setEmail("{$firstName[0]}{$lastName}@centrale-marseille.fr");
            $utilisateur->setUsername("{$firstName[0]}{$lastName}");

            $utilisateur->setRoles($faker->creditCardDetails);
            $utilisateur->setRoles($faker->creditCardDetails);
            $utilisateur->setProfilepicture($faker->imageUrl());







            $manager->persist($utilisateur);
        }



        $manager->flush();
    }


}

#TODO date naissance, photo profil, ANNONCES, commentaires
