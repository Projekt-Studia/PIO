<?php

namespace App\Controller;

use App\Resolver\AnnouncementsResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncementsController extends AbstractController
{
    private AnnouncementsResolverInterface $announcementsResolver;

    public function __construct(AnnouncementsResolverInterface $announcementsResolver)
    {
        $this->announcementsResolver = $announcementsResolver;
    }

    /**
     * @Route("/announcements", name="app_announcements")
     */
    public function index(): Response
    {
        $announcements = $this->announcementsResolver->getAllAnnouncements();

        return $this->render('announcements/index.html.twig', [
            'announcements' => $announcements,
        ]);
    }
}
