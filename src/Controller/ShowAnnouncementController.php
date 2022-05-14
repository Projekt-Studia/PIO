<?php

namespace App\Controller;

use App\Resolver\ShowAnnouncement\FindAnnouncementAndAddViewsResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowAnnouncementController extends AbstractController
{
    public FindAnnouncementAndAddViewsResolverInterface $addViewsResolver;

    public function __construct(FindAnnouncementAndAddViewsResolverInterface $addViewsResolver)
    {
        $this->addViewsResolver = $addViewsResolver;
    }

    /**
     * @Route("/olxd-page/show/announcement/{id}", name="app_show_announcement")
     */
    public function index(int $id): Response
    {
        $announcement = $this->addViewsResolver->returnAnnouncement($id);

        return $this->render('show_announcement/index.html.twig', [
            'announcement' => $announcement,
        ]);
    }
}
