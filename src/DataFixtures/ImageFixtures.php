<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create('fr_FR');

        //  for($img = 1; $img <=100; $img++){
        //     $image = new Images();
        //     $image->setName($faker->image(null, 640, 480));
        //     $product = $this->getReference('prod-'.rand(1, 10));
        //     $image->setProducts($product);
        //     $manager->persist($image);
        //  }

        // $manager->flush();
    }
}
