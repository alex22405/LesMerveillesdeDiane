<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Products;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $faker = Faker\Factory::create('fr_FR');

         for($prod = 1; $prod <=10; $prod++){
            $product = new Products();
            $product->setName($faker->text(5));
            $product->setDescription($faker->text());
            $manager->persist($product);
         }

        $manager->flush();
    }
}
