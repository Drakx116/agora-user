<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordEncoder
    ) {}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('example@gmail.com');
        $user->setPassword($this->passwordEncoder->hashPassword($user, 'password'));

        $manager->persist($user);
        $manager->flush();
    }
}
