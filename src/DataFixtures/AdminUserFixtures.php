<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminUserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ) {}

    public function load(ObjectManager $manager): void
    {
        $admin = (new User())
            ->setEmail('GoldenGoat@admin.com')
            ->setPrenom('Super')
            ->setNom('Admin')
            ->setRoles(['ROLE_ADMIN']);

        $admin->setPassword(
            $this->hasher->hashPassword($admin, 'GoldenGoat111$$$!')
        );

        $manager->persist($admin);
        $manager->flush();
    }
}
