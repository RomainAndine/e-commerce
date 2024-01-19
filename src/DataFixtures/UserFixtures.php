<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Client;
use App\Entity\Vendeur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

         $faker = Factory::create('fr_FR');
         for ($i = 0; $i < 20; $i++) {
             $client = new Client();
             $client->setEmail($faker->email);
             $client->setPassword($faker->password);
             $client->setNom($faker->lastName);
             $client->setPrenom($faker->firstName);
             $client->setRoles(['ROLE_CLIENT']);
             $manager->persist($client);
         }

         for ($i = 0; $i < 20; $i++) {
            $vendeur = new Vendeur();
            $vendeur->setEmail($faker->email);
            $vendeur->setPassword($faker->password);
            $vendeur->setNom($faker->lastName);
            $vendeur->setPrenom($faker->firstName);
            $vendeur->setRoles(['ROLE_VENDEUR']);
            $manager->persist($vendeur);
        


        $manager->flush();
    }
}
}