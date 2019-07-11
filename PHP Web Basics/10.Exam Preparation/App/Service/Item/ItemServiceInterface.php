<?php

namespace App\Service\Item;

use App\Data\ItemDTO;

interface ItemServiceInterface
{
    public function create(ItemDTO $itemDTO): bool;

    public function edit(ItemDTO $itemDTO, int $id): bool;

    public function erase(int $id): bool;

    /**
     * @return \Generator|ItemDTO[]
     */
    public function getAll(): \Generator;

    public function getOneById(int $id) : ItemDTO;

    public function getAllByAuthor();
}