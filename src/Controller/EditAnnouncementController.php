<?php

namespace App\Controller;

use App\Entity\Announcements;
use App\Form\AddAnnouncementsType;
use App\Repository\AnnouncementsRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditAnnouncementController extends AbstractController
{
    public AnnouncementsRepositoryInterface $announcementsRepository;

    public EntityManagerInterface $em;

    public function __construct(AnnouncementsRepositoryInterface $announcementsRepository, EntityManagerInterface $em)
    {
        $this->announcementsRepository = $announcementsRepository;
        $this->em = $em;
    }

    /**
     * @Route("/olxd-page/edit/announcement/{id}", name="app_edit_announcement")
     */
    public function index(Request $request,int $id): Response
    {
        /** @var Announcements $announcement */
        $announcement = $this->announcementsRepository->find($id);

        $form = $this->createForm(AddAnnouncementsType::class, $announcement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('app_announcements');
        }

        return $this->render('edit_announcement/index.html.twig', [
            'announcement' => $announcement,
            'form' => $form->createView(),
        ]);
    }
}
