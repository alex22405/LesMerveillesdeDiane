<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Categories();
        $category->setName('Mariage');
        $manager->persist($category);

        $category = new Categories();
        $category->setName('Anniversaire');
        $manager->persist($category);
        
        $category = new Categories();
        $category->setName('Patisserie');
        $manager->persist($category);
        
        $category = new Categories();
        $category->setName('Boulangerie');
        $manager->persist($category);

        $manager->flush();
    }

    // public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    // {

    // }
}
