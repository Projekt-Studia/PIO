<?php

declare(strict_types=1);

namespace App\Resolver\ShowAnnouncement;

use App\Entity\Announcements;
use App\Repository\AnnouncementsRepositoryInterface;

final class FindAnnouncementAndAddViewsResolver implements FindAnnouncementAndAddViewsResolverInterface
{
    public AnnouncementsRepositoryInterface $announcementsRepository;

    public function __construct(AnnouncementsRepositoryInterface $announcementsRepository)
    {
        $this->announcementsRepository = $announcementsRepository;
    }

    public function returnAnnouncement(int $id): Announcements
    {
        /** @var Announcements $announcement */
        $announcement = $this->announcementsRepository->find($id);
        $this->announcementsRepository->addViews($announcement);

    return $announcement;
    }
}
