<?php

namespace App\Repository\Room;

use App\Data\RoomDTO;
use App\Repository\DatabaseAbstract;

class RoomRepository extends DatabaseAbstract implements RoomRepositoryInterface
{
    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT
                  id,
                  type
            FROM
                  rooms 
            ORDER BY 
                  id ASC 
        ")
            ->execute()
            ->fetch(RoomDTO::class);
    }

    public function findOneById(int $id): RoomDTO
    {
        return $this->db->query("
            SELECT
                  id,
                  type
            FROM 
                  rooms
            WHERE
                  id = ?
        ")
            ->execute([$id])
            ->fetch(RoomDTO::class)
            ->current();
    }
}