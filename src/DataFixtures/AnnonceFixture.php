<?php

namespace App\DataFixtures;



use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\Ad;
use App\Entity\Comment;

use Faker;

class AnnonceFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $query = $manager->createQuery('SELECT u FROM App\Entity\User u');
        $user = $query->getResult();

        $faker = Faker\Factory::create("fr_FR");
        for ($i = 1; $i <= 100; $i++) {

            $annonce = new Ad();

            $annonce->setDate($faker->dateTimeBetween('-6 months'))
                ->setAuthor($faker->randomElement($user))
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
            UserFixtures::class
        ];
    }
}
