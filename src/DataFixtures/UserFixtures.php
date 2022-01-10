<?php

namespace App\DataFixtures;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\Ad;
use App\Entity\Comment;
use App\Entity\User;

function conversion(string $nom): String
{
    return strtolower(strtr(iconv("UTF-8", "ASCII//TRANSLIT", $nom), ' ', '-'));
}

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");
        for($i=1;$i<=50;$i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;


            $utilisateur = new User();
            $utilisateur->setFirstName($firstName);
            $utilisateur->setLastName(" $lastName");

            //$utilisateur->setBio(" $faker->text();");

            $utilisateur->setPassword(" $faker->password");
            $utilisateur->setPromo((mt_rand(1,4)));
            //$utilisateur->setDateNaissance("$faker->date");


            $firstName = conversion($firstName);
            $lastName = conversion($lastName);

            $utilisateur->setEmail("{$firstName[0]}{$lastName}@centrale-marseille.fr");
            $utilisateur->setUsername("{$firstName[0]}{$lastName}");

            $utilisateur->setRoles($faker->streetAddress);

            //$utilisateur->setProfilepicture($faker->imageUrl());







            $manager->persist($utilisateur);
        }



        $manager->flush();
    }


}

#TODO date naissance, photo profil, ANNONCES, commentaires
