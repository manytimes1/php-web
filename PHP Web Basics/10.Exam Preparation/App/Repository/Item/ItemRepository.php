<?php

namespace App\Repository\Item;

use App\Data\ItemDTO;
use App\Data\CategoryDTO;
use App\Data\UserDTO;
use App\Repository\DatabaseAbstract;

class ItemRepository extends DatabaseAbstract implements ItemRepositoryInterface
{
    public function insert(ItemDTO $itemDTO): bool
    {
        $this->db->query("
            INSERT INTO items
              (title, price, description, image, category_id, user_id)
            VALUES 
              (?, ?, ?, ?, ?, ?)
        ")
            ->execute([
                $itemDTO->getTitle(),
                $itemDTO->getPrice(),
                $itemDTO->getDescription(),
                $itemDTO->getImage(),
                $itemDTO->getCategory()->getId(),
                $itemDTO->getUser()->getId()
            ]);

        return true;
    }

    public function update(ItemDTO $itemDTO, int $id): bool
    {
        $this->db->query("
            UPDATE
                items
            SET
              title = ?,
              price = ?,
              description = ?,
              image = ?,
              category_id = ?,
              user_id = ?
            WHERE 
              id = ?     
        ")
            ->execute([
                $itemDTO->getTitle(),
                $itemDTO->getPrice(),
                $itemDTO->getDescription(),
                $itemDTO->getImage(),
                $itemDTO->getCategory()->getId(),
                $itemDTO->getUser()->getId(),
                $id
            ]);

        return true;
    }

    public function delete(int $id): bool
    {
        $this->db->query("
            DELETE FROM
              items
            WHERE
              id = ? 
        ")
            ->execute([$id]);

        return true;
    }

    public function findAll(): \Generator
    {
        $itemResult = $this->db->query("
            SELECT
                  i.id AS itemId,
                  i.title,
                  i.price,
                  i.description,
                  i.image,
                  i.category_id,
                  i.user_id,
                  c.id AS categoryId,
                  c.name,
                  u.id AS userId,
                  u.username,
                  u.password,
                  u.full_name AS fullName,
                  u.location,
                  u.phone 
            FROM
                  items AS i
            INNER JOIN 
                  categories AS c ON i.category_id = c.id
            INNER JOIN 
                  users AS u ON i.user_id = u.id 
            ORDER BY
                  u.location DESC,
                  c.id ASC,
                  i.price ASC  
        ")
            ->execute()
            ->fetchAssoc();

        foreach ($itemResult as $row) {
            /** @var ItemDTO $item */
            /** @var CategoryDTO $category */
            /** @var UserDTO $user */
            $item = $this->dataBinder->bind($row, ItemDTO::class);
            $category = $this->dataBinder->bind($row, CategoryDTO::class);
            $user = $this->dataBinder->bind($row, UserDTO::class);
            $item->setId($row['itemId']);
            $category->setId($row['categoryId']);
            $user->setId($row['userId']);
            $item->setCategory($category);
            $item->setUser($user);

            yield $item;
        }
    }

    public function findOneById(int $id): ItemDTO
    {
        $row = $this->db->query("
            SELECT
                  i.id AS itemId,
                  i.title,
                  i.price,
                  i.description,
                  i.image,
                  i.category_id,
                  i.user_id,
                  c.id AS categoryId,
                  c.name,
                  u.id AS userId,
                  u.username,
                  u.password,
                  u.full_name AS fullName,
                  u.location,
                  u.phone 
            FROM
                  items AS i
            INNER JOIN 
                  categories AS c ON i.category_id = c.id
            INNER JOIN 
                  users AS u ON i.user_id = u.id
            WHERE 
                  i.id = ?
        ")
            ->execute([$id])
            ->fetchAssoc()
            ->current();

        /** @var ItemDTO $item */
        /** @var UserDTO $user */
        /** @var CategoryDTO $category */
        $item = $this->dataBinder->bind($row, ItemDTO::class);
        $category = $this->dataBinder->bind($row, CategoryDTO::class);
        $user = $this->dataBinder->bind($row, UserDTO::class);
        $item->setId($row['itemId']);
        $category->setId($row['categoryId']);
        $user->setId($row['userId']);
        $item->setCategory($category);
        $item->setUser($user);

        return $item;
    }

    public function findAllByAuthorId(int $id): \Generator
    {
        $itemResult = $this->db->query("
            SELECT
                  i.id AS itemId,
                  i.title,
                  i.price,
                  i.description,
                  i.image,
                  i.category_id,
                  i.user_id,
                  c.id AS categoryId,
                  c.name,
                  u.id AS userId,
                  u.username,
                  u.password,
                  u.full_name AS fullName,
                  u.location,
                  u.phone 
            FROM
                  items AS i
            INNER JOIN 
                  categories AS c ON i.category_id = c.id
            INNER JOIN 
                  users AS u ON i.user_id = u.id
            WHERE 
                  i.user_id = ? 
            ORDER BY 
                  i.category_id ASC,
                  i.price DESC  
        ")
            ->execute([$id])
            ->fetchAssoc();

        foreach ($itemResult as $row) {
            /** @var ItemDTO $item */
            /** @var CategoryDTO $category */
            /** @var UserDTO $user */
            $item = $this->dataBinder->bind($row, ItemDTO::class);
            $category = $this->dataBinder->bind($row, CategoryDTO::class);
            $user = $this->dataBinder->bind($row, UserDTO::class);
            $item->setId($row['itemId']);
            $category->setId($row['categoryId']);
            $user->setId($row['userId']);
            $item->setCategory($category);
            $item->setUser($user);

            yield $item;
        }
    }
}