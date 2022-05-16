<?php

namespace App\Controller;

use App\Resolver\AnnouncementsResolverInterface;
use App\Resolver\CategoriesResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncementsController extends AbstractController
{
    private AnnouncementsResolverInterface $announcementsResolver;

    public CategoriesResolverInterface $categoriesResolver;

    public function __construct(
        AnnouncementsResolverInterface $announcementsResolver,
        CategoriesResolverInterface $categoriesResolver
    ) {
        $this->announcementsResolver = $announcementsResolver;
        $this->categoriesResolver = $categoriesResolver;
    }

    /**
     * @Route("/olxd-page/announcements", name="app_announcements")
     */
    public function index(): Response
    {
        $categories = $this->categoriesResolver->getAllCategories();

        $announcements = $this->announcementsResolver->getAllAnnouncements();

        return $this->render('announcements/index.html.twig', [
            'announcements' => $announcements,
            'filters' => $categories,
        ]);
    }

    /**
     * @Route("/olxd-page/announcements/{categoryId}", name="app_announcements_filter")
     */
    public function indexWithFilter(int $categoryId): Response
    {
        $categories = $this->categoriesResolver->getAllCategories();
        $announcements = $this->announcementsResolver->getAllAnnouncementsWithFilter($categoryId);

        return $this->render('announcements/index.html.twig', [
            'announcements' => $announcements,
            'filters' => $categories,
        ]);
    }
}
