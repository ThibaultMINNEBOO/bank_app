<?php

namespace App\DataFixtures;

use App\Factory\AccountFactory;
use App\Factory\OperationFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createMany(30);

        UserFactory::createOne([
            'password' => 'toto',
            'roles' => ['ROLE_ADMIN'],
            'username' => "Thibault",
            'email' => "thibault@gmail.com"
        ]);

        UserFactory::createOne([
            'password' => '1234',
            'roles' => ['ROLE_MEMBER'],
            'username' => "Essai",
            'email' => "essai@gmail.com"
        ]);

        AccountFactory::createMany(100, fn () => ['owner_id' => UserFactory::random()]);

        OperationFactory::createMany(100, fn () => ['account' => AccountFactory::random()]);
    }
}
