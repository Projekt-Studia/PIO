<?php

namespace App\Controller;

use App\Resolver\ShowAnnouncement\MyAnnouncementResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyAnnouncementsController extends AbstractController
{
    public MyAnnouncementResolverInterface $announcementResolver;

    public function __construct(MyAnnouncementResolverInterface $announcementResolver)
    {
        $this->announcementResolver = $announcementResolver;
    }

    /**
     * @Route("/olxd-page/my/announcements", name="app_my_announcements")
     */
    public function index(): Response
    {
        $announcements = $this->announcementResolver->returnAnnouncement();

        return $this->render('my_announcements/index.html.twig', [
            'announcements' => $announcements,
        ]);
    }
}
