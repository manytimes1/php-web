<?php

namespace App\Repository\Item;

use App\Data\ItemDTO;

interface ItemRepositoryInterface
{
    public function insert(ItemDTO $itemDTO): bool;

    public function update(ItemDTO $itemDTO, int $id): bool;

    public function delete(int $id): bool;

    /**
     * @return \Generator|ItemDTO[]
     */
    public function findAll(): \Generator;

    public function findOneById(int $id): ItemDTO;

    public function findAllByAuthorId(int $id): \Generator;
}