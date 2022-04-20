<?php

namespace App\Resolver;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserForAnnouncementResolverIntefrace
{
    public function getUsernameForAnnouncement(): UserInterface;
}
