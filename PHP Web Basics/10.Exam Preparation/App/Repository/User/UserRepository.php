<?php

namespace App\Repository\User;

use App\Data\UserDTO;
use App\Repository\DatabaseAbstract;

class UserRepository extends DatabaseAbstract implements UserRepositoryInterface
{
    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query("
            INSERT INTO users 
              (username, password, full_name, location, phone)
            VALUES 
              (?, ?, ?, ?, ?)
        ")
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFullName(),
                $userDTO->getLocation(),
                $userDTO->getPhone()
            ]);

        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query("
            SELECT
                  id,
                  username,
                  password,
                  full_name AS fullName,
                  location,
                  phone 
            FROM 
                  users 
            WHERE 
                  username = ? 
        ")
            ->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOne(int $id): ?UserDTO
    {
        return $this->db->query("
            SELECT
                  id,
                  username,
                  password,
                  full_name AS fullName,
                  location,
                  phone 
            FROM 
                  users 
            WHERE 
                  id = ? 
        ")
            ->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }
}