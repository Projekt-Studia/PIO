<?php

namespace App\Repository;

use App\Entity\Announcements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Announcements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Announcements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Announcements[]    findAll()
 * @method Announcements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnouncementsRepository extends ServiceEntityRepository implements AnnouncementsRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Announcements::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Announcements $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Announcements $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function addViews(Announcements $entity, bool $flush = true): void
    {
        $entity->setViews($entity->getViews() + 1);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
