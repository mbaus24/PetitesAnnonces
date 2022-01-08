<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use App\Entity\Comment;
use App\Entity\Utilisateur;
use Faker;

class AnnonceFixture extends Fixture
{
    public function load(ObjectManager $manager )
    {

        $utilisateur = $manager->getRepository(Utilisateur::class)->findAll();
        $faker = Faker\Factory::create("fr_FR");
        for($i=1;$i<=10;$i++){

            $annonce =  new Annonce();
            $annonce->setDate($faker->dateTimeBetween('-6 months'))
                    ->setAutheur($utilisateur[rand(0,sizeof($utilisateur)-1)])
                    ->setDescription($faker->realText)
                    ->setLocation($faker->city)
                    ->setResolved($faker->boolean)
                    ->setTitle($faker->title)
                    ->setType(mt_rand(1,5));


            $manager->persist($annonce);

        }

        $manager->flush();
    }

}
