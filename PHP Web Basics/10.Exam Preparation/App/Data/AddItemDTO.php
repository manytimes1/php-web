<?php

namespace App\Data;

class AddItemDTO
{
    /**
     * @var ItemDTO
     */
    private $item;

    /**
     * @var CategoryDTO[]
     */
    private $categories;

    /**
     * @return ItemDTO
     */
    public function getItem(): ItemDTO
    {
        return $this->item;
    }

    /**
     * @param ItemDTO $item
     */
    public function setItem(ItemDTO $item): void
    {
        $this->item = $item;
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param CategoryDTO[] $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
}