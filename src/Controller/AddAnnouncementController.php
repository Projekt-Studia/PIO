<?php

namespace App\Controller;

use App\Entity\Announcements;
use App\Form\AddAnnouncementsType;
use App\Resolver\UserForAnnouncementResolverIntefrace;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddAnnouncementController extends AbstractController
{
    private UserForAnnouncementResolverIntefrace $announcementResolverIntefrace;

    private EntityManagerInterface $entityManager;

    public function __construct(
        UserForAnnouncementResolverIntefrace $announcementResolverIntefrace,
        EntityManagerInterface $entityManager
    ) {
        $this->announcementResolverIntefrace = $announcementResolverIntefrace;
        $this->entityManager = $entityManager;
    }

    /**
     * Require ROLE_USER for all the actions of this controller
     *
     * @IsGranted("ROLE_USER")
     *
     * @Route("/olxd-page/add-announcements", name="app_add_announcements")
     */
    public function index(Request $request): Response
    {
        $announcement = new Announcements();
        $user = $this->announcementResolverIntefrace->getUsernameForAnnouncement();

        $announcement->setUserId($user);

        $form = $this->createForm(AddAnnouncementsType::class, $announcement);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Announcements $announcement */
            $announcement = $form->getData();
            $announcement->setActive();
            $announcement->setViews();
            $this->entityManager->persist($announcement);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_announcements');
        }

        return $this->renderForm('add_announcement/index.html.twig', [
            'form' => $form,
        ]);
    }
}
