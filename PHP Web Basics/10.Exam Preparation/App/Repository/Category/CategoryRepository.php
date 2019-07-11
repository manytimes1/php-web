<?php

namespace App\Repository\Category;

use App\Data\CategoryDTO;
use App\Repository\DatabaseAbstract;

class CategoryRepository extends DatabaseAbstract implements CategoryRepositoryInterface
{
    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT
                  id,
                  name
            FROM
                  categories 
            ORDER BY 
                  id ASC 
        ")
            ->execute()
            ->fetch(CategoryDTO::class);
    }

    public function findOneById(int $id): CategoryDTO
    {
        return $this->db->query("
            SELECT
                  id,
                  name
            FROM 
                  categories
            WHERE
                  id = ?
        ")
            ->execute([$id])
            ->fetch(CategoryDTO::class)
            ->current();
    }
}