<?php

namespace App\Repository\Town;

use App\Data\TownDTO;

interface TownRepositoryInterface
{
    /**
     * @return \Generator|TownDTO[]
     */
    public function findAll(): \Generator;

    public function findOneById(int $id): TownDTO;
}