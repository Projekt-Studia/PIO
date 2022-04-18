<?php

declare(strict_types=1);

namespace App\Resolver;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

final class UserForAnnouncementResolver implements UserForAnnouncementResolverIntefrace
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function getUsernameForAnnouncement(): UserInterface
    {
        $user = $this->security->getUser();

        if(null === $user) {
            throw new \Exception('Can not found user');
        }

        return $user;
    }
}
