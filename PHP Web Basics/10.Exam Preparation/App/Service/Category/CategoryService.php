<?php

namespace App\Service\Category;

use App\Data\CategoryDTO;
use App\Repository\Category\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->categoryRepository->findAll();
    }

    public function getOneById(int $id): CategoryDTO
    {
        return $this->categoryRepository->findOneById($id);
    }
}