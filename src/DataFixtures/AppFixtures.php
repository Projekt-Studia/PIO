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

        $user1 = new User();
        $user1->setEmail('piotr@piotr.com');
        $user1->setPassword($this->passEncoder->hashPassword($user1,'pass'));
        $user1->setRoles([]);

        $user2 = new User();
        $user2->setEmail('janusz@janusz.com');
        $user2->setPassword($this->passEncoder->hashPassword($user2,'pass'));
        $user2->setRoles([]);

        $user3 = new User();
        $user3->setEmail('ukasz@ukasz.com');
        $user3->setPassword($this->passEncoder->hashPassword($user3,'pass'));
        $user3->setRoles([]);

        $user4 = new User();
        $user4->setEmail('dounuta@dounuta.com');
        $user4->setPassword($this->passEncoder->hashPassword($user4,'pass'));
        $user4->setRoles([]);

        $user5 = new User();
        $user5->setEmail('szef@szef.com');
        $user5->setPassword($this->passEncoder->hashPassword($user5,'pass'));
        $user5->setRoles([]);

        $user6 = new User();
        $user6->setEmail('kamil@kamil.com');
        $user6->setPassword($this->passEncoder->hashPassword($user6,'pass'));
        $user6->setRoles([]);

        $user7 = new User();
        $user7->setEmail('hladek@hladek.com');
        $user7->setPassword($this->passEncoder->hashPassword($user7,'pass'));
        $user7->setRoles([]);

        $user8 = new User();
        $user8->setEmail('sylwia@sylwia.com');
        $user8->setPassword($this->passEncoder->hashPassword($user8,'pass'));
        $user8->setRoles([]);

        $user9 = new User();
        $user9->setEmail('wiktor@wiktor.com');
        $user9->setPassword($this->passEncoder->hashPassword($user9,'pass'));
        $user9->setRoles([]);

        $user10 = new User();
        $user10->setEmail('ryszard@ryszard.com');
        $user10->setPassword($this->passEncoder->hashPassword($user10,'pass'));
        $user10->setRoles([]);

        $user11 = new User();
        $user11->setEmail('bartosz@bartosz.com');
        $user11->setPassword($this->passEncoder->hashPassword($user11,'pass'));
        $user11->setRoles([]);

        $categoryCars = new Categories();
        $categoryCars->setName('Cars');

        $categoryCarParts = new Categories();
        $categoryCarParts->setName('CarParts');

        $categorySport = new Categories();
        $categorySport->setName('Sport');

        $categoryHealth = new Categories();
        $categoryHealth->setName('Health');

        $categoryFasion = new Categories();
        $categoryFasion->setName('Fasion');

        $categoryBuildings = new Categories();
        $categoryBuildings->setName('Buildings');

        $categoryForRent = new Categories();
        $categoryForRent->setName('ForRent');

        $categoryGardening = new Categories();
        $categoryGardening->setName('Gardening');

        $categorySlaves = new Categories();
        $categorySlaves->setName('Slaves');

        $categoryPets = new Categories();
        $categoryPets->setName('Pets');

        $categoryElectronics = new Categories();
        $categoryElectronics->setName('Electronics');

        $categoryOnionForFree = new Categories();
        $categoryOnionForFree->setName('OnionForFree');

        $categoryForKids = new Categories();
        $categoryForKids->setName('ForKids');

        $categoryOthers = new Categories();
        $categoryOthers->setName('Others');

        $announcements1 = new Announcements();
        $announcements1->setTitle('Opel Astra');
        $announcements1->setDescription('Opel Astra na sprzedaz');
        $announcements1->setCategoryId($categoryCars);
        $announcements1->setUserId($user1);
        $announcements1->setPrice(5000);
        $announcements1->setActive(true);
        $announcements1->setViews(15);

        $announcements2 = new Announcements();
        $announcements2->setTitle('Mlody niewolnik, maly przebieg');
        $announcements2->setDescription('Mlody niewolnik prosto z lapanki, maly przebieg, nie krecony');
        $announcements2->setCategoryId($categorySlaves);
        $announcements2->setUserId($user10);
        $announcements2->setPrice(20000);
        $announcements2->setActive(true);
        $announcements2->setViews(352);

        $announcements4 = new Announcements();
        $announcements4->setTitle('Masc na bol czegos');
        $announcements4->setDescription('Nowa formula prosto z Cebulandii, masc na bol tylnej czesci ciala');
        $announcements4->setCategoryId($categoryHealth);
        $announcements4->setUserId($user8);
        $announcements4->setPrice(15);
        $announcements4->setActive(true);
        $announcements4->setViews(3);

        $announcements5 = new Announcements();
        $announcements5->setTitle('Granat F1');
        $announcements5->setDescription('Prosto z wschodniego frontu zabawka dla dzieci, jednorazowego uzytku');
        $announcements5->setCategoryId($categoryForKids);
        $announcements5->setUserId($user2);
        $announcements5->setPrice(150);
        $announcements5->setActive(true);
        $announcements5->setViews(33);

        $announcements6 = new Announcements();
        $announcements6->setTitle('Piesel');
        $announcements6->setDescription('Oddam w dobre rece piesela, mlody i bardzo kochany');
        $announcements6->setCategoryId($categoryPets);
        $announcements6->setUserId($user2);
        $announcements6->setPrice(500);
        $announcements6->setActive(true);
        $announcements6->setViews(100);

        $announcements7 = new Announcements();
        $announcements7->setTitle('Kotel');
        $announcements7->setDescription('Miauczy, drapie i wszystko co najgorze');
        $announcements7->setCategoryId($categoryPets);
        $announcements7->setUserId($user2);
        $announcements7->setPrice(10);
        $announcements7->setActive(true);
        $announcements7->setViews(558);

        $announcements8 = new Announcements();
        $announcements8->setTitle('Peugeot 407');
        $announcements8->setDescription('Pali, jezdzi, LPG po taniosci, kolizja z paleta pod Dino');
        $announcements8->setCategoryId($categoryCars);
        $announcements8->setUserId($user11);
        $announcements8->setPrice(12000);
        $announcements8->setActive(true);
        $announcements8->setViews(999);

        $announcements9 = new Announcements();
        $announcements9->setTitle('Wulfdzwagen Gulf Szysc');
        $announcements9->setDescription('Paaaaanie, Niemiec tak dbal, ze samochod sam po bulki jezdzil');
        $announcements9->setCategoryId($categoryCars);
        $announcements9->setUserId($user6);
        $announcements9->setPrice(30000);
        $announcements9->setActive(true);
        $announcements9->setViews(3459);

        $announcements10 = new Announcements();
        $announcements10->setTitle('Sukienka wyjsciowa Prada');
        $announcements10->setDescription('Elegancka kobieca sukienka, tak wyjsciowa ze sama wychodzi z szafy');
        $announcements10->setCategoryId($categoryFasion);
        $announcements10->setUserId($user8);
        $announcements10->setPrice(15000);
        $announcements10->setActive(true);
        $announcements10->setViews(661);

        $announcements11 = new Announcements();
        $announcements11->setTitle('Dom niewielorodzinny 180metrow');
        $announcements11->setDescription('Mala chatka na skrju lasu w ktorej nikt nigdy nie zamieszka');
        $announcements11->setCategoryId($categoryBuildings);
        $announcements11->setUserId($user3);
        $announcements11->setPrice(500000);
        $announcements11->setActive(true);
        $announcements11->setViews(2);

        $announcements12 = new Announcements();
        $announcements12->setTitle('Miejsce na wycieraczce do wynajecia');
        $announcements12->setDescription('Wynajme miejsce do spania na wycieraczce przed wejsciem, kolo budy psa');
        $announcements12->setCategoryId($categoryForRent);
        $announcements12->setUserId($user4);
        $announcements12->setPrice(3000);
        $announcements12->setActive(true);
        $announcements12->setViews(1887);

        $announcements13 = new Announcements();
        $announcements13->setTitle('Oddam za darmo komputer');
        $announcements13->setDescription('Oddam za darmo laptopa, cena do negocjacji');
        $announcements13->setCategoryId($categoryOnionForFree);
        $announcements13->setUserId($user7);
        $announcements13->setPrice(7000);
        $announcements13->setActive(true);
        $announcements13->setViews(0);

        $announcements14 = new Announcements();
        $announcements14->setTitle('Oddam za darmo komputer');
        $announcements14->setDescription('Oddam za darmo laptopa, cena do negocjacji');
        $announcements14->setCategoryId($categoryCarParts);
        $announcements14->setUserId($user8);
        $announcements14->setPrice(7000);
        $announcements14->setActive(true);
        $announcements14->setViews(0);

        $manager->persist($admin);
        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);
        $manager->persist($user6);
        $manager->persist($user7);
        $manager->persist($user8);
        $manager->persist($user9);
        $manager->persist($user10);
        $manager->persist($user11);
        $manager->persist($categoryCars);
        $manager->persist($categoryCarParts);
        $manager->persist($categorySport);
        $manager->persist($categorySlaves);
        $manager->persist($categoryBuildings);
        $manager->persist($categoryHealth);
        $manager->persist($categoryForRent);
        $manager->persist($categoryForKids);
        $manager->persist($categoryOnionForFree);
        $manager->persist($categoryElectronics);
        $manager->persist($categoryFasion);
        $manager->persist($categoryGardening);
        $manager->persist($categoryOthers);
        $manager->persist($categoryPets);
        $manager->persist($announcements1);
        $manager->persist($announcements2);
        $manager->persist($announcements4);
        $manager->persist($announcements5);
        $manager->persist($announcements6);
        $manager->persist($announcements7);
        $manager->persist($announcements8);
        $manager->persist($announcements9);
        $manager->persist($announcements10);
        $manager->persist($announcements11);
        $manager->persist($announcements12);
        $manager->persist($announcements13);
        $manager->persist($announcements14);


        $manager->flush();
    }
}
