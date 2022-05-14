<?php

namespace App\Controller;

use App\Entity\Announcements;
use App\Repository\AnnouncementsRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ActivateAndDeactivateController extends AbstractController
{
    public AnnouncementsRepositoryInterface $announcementsRepository;

    public EntityManagerInterface $em;

    public function __construct(AnnouncementsRepositoryInterface $announcementsRepository, EntityManagerInterface $em)
    {
        $this->announcementsRepository = $announcementsRepository;
        $this->em = $em;
    }

    /**
     * @Route("/activate/and/deactivate/{id}", name="app_activate_and_deactivate")
     */
    public function index(int $id)
    {
        /** @var Announcements $announcement */
        $announcement = $this->announcementsRepository->find($id);

        if ($announcement->getActive())
        {
            $announcement->setActive(false);
        } else {
            $announcement->setActive(true);
        }

        $this->em->persist($announcement);
        $this->em->flush();

        return $this->redirectToRoute('app_my_announcements');
    }
}
