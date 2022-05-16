<?php

namespace App\Repository;

use App\Entity\Categories;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * @method Categories|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categories|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categories[]    findAll()
 * @method Categories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
interface CategoriesRepositoryInterface
{
    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Categories $entity, bool $flush = true): void;

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Categories $entity, bool $flush = true): void;
}