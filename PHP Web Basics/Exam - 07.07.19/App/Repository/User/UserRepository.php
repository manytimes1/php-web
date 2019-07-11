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
              (email, password, name, phone)
            VALUES 
              (?, ?, ?, ?)
        ")
            ->execute([
                $userDTO->getEmail(),
                $userDTO->getPassword(),
                $userDTO->getName(),
                $userDTO->getPhone()
            ]);

        return true;
    }

    public function moneySpent(UserDTO $userDTO, int $id): bool
    {
        $this->db->query("
            UPDATE
                users
            SET
              money_spent = ?  
            WHERE 
              id = ?
        ")
            ->execute([
                $userDTO->getMoneySpent(),
                $id
            ]);

        return true;
    }

    public function findOneByEmail(string $email): ?UserDTO
    {
        return $this->db->query("
            SELECT
                  id,
                  email,
                  password,
                  name,
                  phone,
                  money_spent AS moneySpent
            FROM 
                  users 
            WHERE 
                  email = ? 
        ")
            ->execute([$email])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOne(int $id): ?UserDTO
    {
        return $this->db->query("
            SELECT
                  id,
                  email,
                  password,
                  name,
                  phone,
                  money_spent AS moneySpent
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