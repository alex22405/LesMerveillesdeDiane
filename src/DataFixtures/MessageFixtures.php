<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Faker\Factory;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MessageFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager)
    {
        // Contact
        for ($i = 0; $i < 5; $i++) {
            $message = new Message();
            $message->setFullName($this->faker->firstName())
                ->setEmail($this->faker->email())
                ->setSubject('Demande n°' . ($i + 1))
                ->setMessage($this->faker->text());

            $manager->persist($message);
        }

        $manager->flush();
    }
}
