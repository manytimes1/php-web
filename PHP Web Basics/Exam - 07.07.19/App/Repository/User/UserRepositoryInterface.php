<?php

namespace App\Repository\User;

use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO): bool;

    public function moneySpent(UserDTO $userDTO, int $id): bool;

    public function findOneByEmail(string $email): ?UserDTO;

    public function findOne(int $id): ?UserDTO;
}