<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

         $faker = Factory::create('fr_FR');
         for ($i = 0; $i < 20; $i++) {
             $user = new User();
             $user->setEmail($faker->email);
             $user->setPassword($faker->password);
             $user->setPrenom($faker->firstName);
             $user->setNom($faker->lastName);
             $user->setRoles($faker->randomElement(['ROLE_ADMIN', 'ROLE_USER']));
             $manager->persist($user);
         }
        


        $manager->flush();
    }
}
