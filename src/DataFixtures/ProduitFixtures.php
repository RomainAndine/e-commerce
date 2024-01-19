<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

         $faker = Factory::create('fr_FR');
         for ($i = 0; $i < 20; $i++) {
             $produit = new Produit();
             $produit->setDesignation($faker->word);
             $produit->setPrixUnit($faker->randomFloat(2, 10, 100));
             $produit->setQteStock($faker->numberBetween(10, 100));
             $manager->persist($produit);
         }

        $manager->flush();
    }
}
