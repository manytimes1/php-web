<?php

namespace App\Repository\Town;

use App\Data\TownDTO;
use App\Repository\DatabaseAbstract;

class TownRepository extends DatabaseAbstract implements TownRepositoryInterface
{
    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT
                  id,
                  name
            FROM
                  towns 
            ORDER BY 
                  id ASC 
        ")
            ->execute()
            ->fetch(TownDTO::class);
    }

    public function findOneById(int $id): TownDTO
    {
        return $this->db->query("
            SELECT
                  id,
                  name
            FROM 
                  towns
            WHERE
                  id = ?
        ")
            ->execute([$id])
            ->fetch(TownDTO::class)
            ->current();
    }
}