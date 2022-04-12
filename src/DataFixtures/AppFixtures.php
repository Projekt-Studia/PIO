<?php

namespace App\DataFixtures;

use App\Entity\Announcements;
use App\Entity\Categories;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passEncoder;

    public function __construct(UserPasswordHasherInterface $passEncoder)
    {
        $this->passEncoder = $passEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@admin.com');
        $admin->setPassword($this->passEncoder->hashPassword($admin,'pass'));
        $admin->setRoles(['ROLE_ADMIN']);

        $user = new User();
        $user->setEmail('user@user.com');
        $user->setPassword($this->passEncoder->hashPassword($user,'pass'));
        $user->setRoles([]);

        $category = new Categories();
        $category->setName('Cars');

        $announcements = new Announcements();
        $announcements->setTitle('Opel Astra');
        $announcements->setDescription('Opel Astra na sprzedaz');
        $announcements->setCategoryId($category);
        $announcements->setUserId($user);
        $announcements->setPrice(5000);
        $announcements->setActive(true);
        $announcements->setViews(15);

        $manager->persist($admin);
        $manager->persist($user);
        $manager->persist($category);
        $manager->persist($announcements);
        $manager->flush();
    }
}
