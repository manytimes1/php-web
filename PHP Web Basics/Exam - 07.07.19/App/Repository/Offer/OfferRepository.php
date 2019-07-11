<?php

namespace App\Repository\Offer;

use App\Data\OfferDTO;
use App\Data\RoomDTO;
use App\Data\TownDTO;
use App\Data\UserDTO;
use App\Repository\DatabaseAbstract;

class OfferRepository extends DatabaseAbstract implements OfferRepositoryInterface
{
    public function insert(OfferDTO $offerDTO): bool
    {
        $this->db->query("
            INSERT INTO offers
              (price, days, description, picture_url, room_id, town_id, user_id)
            VALUES 
              (?, ?, ?, ?, ?, ?, ?)
        ")
            ->execute([
                $offerDTO->getPrice(),
                $offerDTO->getDays(),
                $offerDTO->getDescription(),
                $offerDTO->getPictureUrl(),
                $offerDTO->getRoom()->getId(),
                $offerDTO->getTown()->getId(),
                $offerDTO->getUser()->getId()
            ]);

        return true;
    }

    public function update(OfferDTO $offerDTO, int $id): bool
    {
        $this->db->query("
            UPDATE
                offers
            SET
              price = ?,
              days = ?,
              description = ?,
              picture_url = ?,
              room_id = ?,
              town_id = ?,
              user_id = ?,  
              is_occupied = ?  
            WHERE 
              id = ?
        ")
            ->execute([
                $offerDTO->getPrice(),
                $offerDTO->getDays(),
                $offerDTO->getDescription(),
                $offerDTO->getPictureUrl(),
                $offerDTO->getRoom()->getId(),
                $offerDTO->getTown()->getId(),
                $offerDTO->getUser()->getId(),
                $offerDTO->getIsOccupied(),
                $id
            ]);

        return true;
    }

    public function delete(int $id): bool
    {
        $this->db->query("
            DELETE FROM
              offers
            WHERE
              id = ? 
        ")
            ->execute([$id]);

        return true;
    }

    public function changeStatus(OfferDTO $offerDTO, int $id): bool
    {
        $this->db->query("
            UPDATE
                offers
            SET
              is_occupied = ?  
            WHERE 
              id = ?
        ")
            ->execute([
                $offerDTO->getIsOccupied(),
                $id
            ]);

        return true;
    }

    public function findAll(): \Generator
    {
        $offerResult = $this->db->query("
            SELECT
                  o.id AS offerId,
                  o.price,
                  o.days,
                  o.description,
                  o.picture_url,
                  o.room_id,
                  o.town_id, 
                  o.user_id,
                   is_occupied,
                  r.id AS roomId,
                  r.type,
                  t.id AS townId,
                  t.name AS name, 
                  u.id AS userId,
                  u.email,
                  u.password,
                  u.name AS authorName,
                  u.phone 
            FROM
                  offers AS o
            INNER JOIN 
                  rooms AS r ON o.room_id = r.id 
            INNER JOIN
                  towns AS t ON o.town_id = t.id    
            INNER JOIN 
                  users AS u ON o.user_id = u.id 
            ORDER BY
                  added_on DESC
        ")
            ->execute()
            ->fetchAssoc();

        foreach ($offerResult as $row) {
            /** @var OfferDTO $offer */
            /** @var TownDTO $town */
            /** @var RoomDTO $room */
            /** @var UserDTO $user */
            $offer = $this->dataBinder->bind($row, OfferDTO::class);
            $town = $this->dataBinder->bind($row, TownDTO::class);
            $room = $this->dataBinder->bind($row, RoomDTO::class);
            $user = $this->dataBinder->bind($row, UserDTO::class);
            $offer->setId($row['offerId']);
            $town->setId($row['townId']);
            $room->setId($row['roomId']);
            $user->setId($row['userId']);
            $offer->setTown($town);
            $offer->setRoom($room);
            $offer->setUser($user);

            yield $offer;
        }
    }

    public function findOneById(int $id): OfferDTO
    {
        $row = $this->db->query("
            SELECT
                  o.id AS offerId,
                  o.price,
                  o.days,
                  o.description,
                  o.picture_url,
                  o.room_id,
                  o.town_id, 
                  o.user_id,
                  CASE
                     WHEN o.is_occupied = 0 THEN 'Yes'
                     WHEN o.is_occupied = 1 THEN 'No' 
                  END AS is_occupied,
                  r.id AS roomId,
                  r.type,
                  t.id AS townId,
                  t.name AS name, 
                  u.id AS userId,
                  u.email,
                  u.password,
                  u.name AS authorName,
                  u.phone 
            FROM
                  offers AS o
            INNER JOIN 
                  rooms AS r ON o.room_id = r.id 
            INNER JOIN
                  towns AS t ON o.town_id = t.id    
            INNER JOIN 
                  users AS u ON o.user_id = u.id
            WHERE 
                  o.id = ?
        ")
            ->execute([$id])
            ->fetchAssoc()
            ->current();

        /** @var OfferDTO $offer */
        /** @var TownDTO $town */
        /** @var RoomDTO $room */
        /** @var UserDTO $user */
        $offer = $this->dataBinder->bind($row, OfferDTO::class);
        $town = $this->dataBinder->bind($row, TownDTO::class);
        $room = $this->dataBinder->bind($row, RoomDTO::class);
        $user = $this->dataBinder->bind($row, UserDTO::class);
        $offer->setId($row['offerId']);
        $town->setId($row['townId']);
        $room->setId($row['roomId']);
        $user->setId($row['userId']);
        $offer->setTown($town);
        $offer->setRoom($room);
        $offer->setUser($user);

        return $offer;
    }

    public function findAllByAuthorId(int $id): \Generator
    {
        $offerResult = $this->db->query("
            SELECT
                  o.id AS offerId,
                  o.price,
                  o.days,
                  o.description,
                  o.picture_url,
                  o.room_id,
                  o.town_id, 
                  o.user_id,
                  CASE
                     WHEN o.is_occupied = 0 THEN 'Yes'
                     WHEN o.is_occupied = 1 THEN 'No'
                  END AS is_occupied,
                  r.id AS roomId,
                  r.type,
                  t.id AS townId,
                  t.name AS name, 
                  u.id AS userId,
                  u.email,
                  u.password,
                  u.name AS authorName,
                  u.phone 
            FROM
                  offers AS o
            INNER JOIN 
                  rooms AS r ON o.room_id = r.id 
            INNER JOIN
                  towns AS t ON o.town_id = t.id    
            INNER JOIN 
                  users AS u ON o.user_id = u.id
            WHERE 
                  o.user_id = ?
            ORDER BY 
                  added_on DESC

        ")
            ->execute([$id])
            ->fetchAssoc();

        foreach ($offerResult as $row) {
            /** @var OfferDTO $offer */
            /** @var TownDTO $town */
            /** @var RoomDTO $room */
            /** @var UserDTO $user */
            $offer = $this->dataBinder->bind($row, OfferDTO::class);
            $town = $this->dataBinder->bind($row, TownDTO::class);
            $room = $this->dataBinder->bind($row, RoomDTO::class);
            $user = $this->dataBinder->bind($row, UserDTO::class);
            $offer->setId($row['offerId']);
            $town->setId($row['townId']);
            $room->setId($row['roomId']);
            $user->setId($row['userId']);
            $offer->setTown($town);
            $offer->setRoom($room);
            $offer->setUser($user);

            yield $offer;
        }
    }
}