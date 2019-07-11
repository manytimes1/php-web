<?php

namespace App\Service\User;

use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO): bool;

    public function login(string $username, string $password): ?UserDTO;

    public function getCurrentUser(): ?UserDTO;

    public function isLogged(): bool;
}