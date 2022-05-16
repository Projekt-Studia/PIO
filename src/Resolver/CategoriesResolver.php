<?php

declare(strict_types=1);

namespace App\Resolver;

use App\Repository\CategoriesRepositoryInterface;

final class CategoriesResolver implements CategoriesResolverInterface
{
    private CategoriesRepositoryInterface $categoriesRepository;

    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getAllCategories()
    {
        return $this->categoriesRepository->findAll();
    }
}
