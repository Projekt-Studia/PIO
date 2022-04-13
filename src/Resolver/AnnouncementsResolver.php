<?php

declare(strict_types=1);

namespace App\Resolver;

use App\Repository\AnnouncementsRepositoryInterface;

final class AnnouncementsResolver implements AnnouncementsResolverInterface
{
    private AnnouncementsRepositoryInterface $announcementsRepository;

    public function __construct(AnnouncementsRepositoryInterface $announcementsRepository)
    {
        $this->announcementsRepository = $announcementsRepository;
    }

    public function getAllAnnouncements()
    {
        return $this->announcementsRepository->findAll();
    }
}