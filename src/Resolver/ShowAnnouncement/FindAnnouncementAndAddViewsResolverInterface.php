<?php

namespace App\Resolver\ShowAnnouncement;

use App\Entity\Announcements;

interface FindAnnouncementAndAddViewsResolverInterface
{
    public function returnAnnouncement(int $id): Announcements;
}
