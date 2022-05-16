<?php

namespace App\Resolver;

interface AnnouncementsResolverInterface
{
    public function getAllAnnouncements();

    public function getAllAnnouncementsWithFilter(int $categoryId);
}