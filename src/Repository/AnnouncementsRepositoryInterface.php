<?php

namespace App\Repository;


use App\Entity\Announcements;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * @method Announcements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Announcements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Announcements[]    findAll()
 * @method Announcements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
interface AnnouncementsRepositoryInterface
{
    public function add(Announcements $entity, bool $flush = true): void;

    public function remove(Announcements $entity, bool $flush = true): void;
}