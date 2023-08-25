<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture implements DependentFixtureInterface
{
    private $counter = 1;

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
    
    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;
    
        return $category;
    }

    public function getDependencies(): array
    {
        return [
            ProductsFixtures::class
        ];
    }
}
