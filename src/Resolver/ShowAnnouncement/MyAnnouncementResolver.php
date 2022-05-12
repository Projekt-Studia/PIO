<?php

declare(strict_types=1);

namespace App\Resolver\ShowAnnouncement;

use App\Entity\User;
use App\Repository\AnnouncementsRepositoryInterface;
use Symfony\Component\Security\Core\Security;

final class MyAnnouncementResolver implements MyAnnouncementResolverInterface
{
    public Security $security;

    public AnnouncementsRepositoryInterface $announcementsRepository;

    public function __construct(Security $security, AnnouncementsRepositoryInterface $announcementsRepository)
    {
        $this->security = $security;
        $this->announcementsRepository = $announcementsRepository;
    }

    public function returnAnnouncement(): array
    {
        /** @var User $user */
        $user = $this->security->getUser();
        $announcements = $this->announcementsRepository->findBy([ 'userId' => $user->getId() ]);

        return $announcements;
    }
}
