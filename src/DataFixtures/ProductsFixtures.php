<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Products;
use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $faker = Faker\Factory::create('fr_FR');

         for($prod = 1; $prod <=10; $prod++){
            $product = new Products();
            $product->setProductName($faker->text(5));
            $product->setProductDescription($faker->text());
            $product->setProductImage($faker->image());
            $product->setProductCreatedAt($faker->dateTime());

            $category = $this->getReference(('cat-'. rand(1,4)));
            $product->setCategoryId($category);

            $this->setReference('prod-'.$prod, $product);
            $manager->persist($product);
         }

        $manager->flush();
    }
}
