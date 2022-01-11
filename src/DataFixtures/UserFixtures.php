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
        for($i=1;$i<=100;$i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;


            $user = new User();
            $user->setFirstName($firstName);
            $user->setLastName(" $lastName");

            $user->setBio(" $faker->realText();");

            $user->setPassword(" $faker->password");
            $user->setPromo((mt_rand(1,4)));
            //$utilisateur->setDateNaissance("$faker->date");


            $firstName = conversion($firstName);
            $lastName = conversion($lastName);

            $user->setEmail("{$firstName[0]}{$lastName}@centrale-marseille.fr");
            $user->setUsername("{$firstName[0]}{$lastName}");

            $user->setRoles($faker->streetAddress);

            $user->setProfilepicture("https://fakeface.rest/face/view/".$i*rand(0,1000));







            $manager->persist($user);
        }



        $manager->flush();
    }


}

#TODO date naissance, photo profil, ANNONCES, commentaires
