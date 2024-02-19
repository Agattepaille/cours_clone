<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder)
    {
        
    }
    
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        for ($i=0; $i < 10 ; $i++) {         
            $user = new User();
            $user->setEmail($faker->email);
            $user->setLastname($faker->lastName);
            $user->setFirstname($faker->firstName);
            $user->setAddress($faker->streetAddress);
            $user->setCity($faker->city);
            $user->setZipcode($faker->postcode);
            $user->setPhone($faker->phoneNumber);
            $user->setPassword($this->passwordEncoder->hashPassword($user, 'secret'));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
