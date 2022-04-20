<?php

namespace App\Controller;

use App\Entity\Announcements;
use App\Form\AddAnnouncementsType;
use App\Resolver\UserForAnnouncementResolverIntefrace;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddAnnouncementController extends AbstractController
{
    private UserForAnnouncementResolverIntefrace $announcementResolverIntefrace;

    public function __construct(UserForAnnouncementResolverIntefrace $announcementResolverIntefrace)
    {
        $this->announcementResolverIntefrace = $announcementResolverIntefrace;
    }

    /**
     * Require ROLE_USER for all the actions of this controller
     *
     * @IsGranted("ROLE_USER")
     *
     * @Route("/add-announcements", name="app_add_announcements")
     */
    public function index(Request $request): Response
    {
        $announcement = new Announcements();
        $user = $this->announcementResolverIntefrace->getUsernameForAnnouncement();

        $announcement->setUserId($user);

        $form = $this->createForm(AddAnnouncementsType::class, $announcement);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $announcement = $form->getData();

            return $this->redirectToRoute('app_announcements');
        }

        return $this->renderForm('add_announcement/index.html.twig', [
            'form' => $form,
        ]);
    }
}
