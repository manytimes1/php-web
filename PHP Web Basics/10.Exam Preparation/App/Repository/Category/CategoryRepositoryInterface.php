<?php

namespace App\Repository\Category;

use App\Data\CategoryDTO;

interface CategoryRepositoryInterface
{
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function findAll(): \Generator;

    public function findOneById(int $id): CategoryDTO;
}