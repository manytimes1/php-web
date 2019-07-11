<?php

namespace App\Service\User;

use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO): bool;

    public function login(string $email, string $password): ?UserDTO;

    public function updateSpentMoney(UserDTO $userDTO, int $id): bool;

    public function getCurrentUser(): ?UserDTO;

    public function isLogged(): bool;
}