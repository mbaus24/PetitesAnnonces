<?php

namespace App\DataFixtures;
use Faker\Factory;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $manager->flush();
    }
}
