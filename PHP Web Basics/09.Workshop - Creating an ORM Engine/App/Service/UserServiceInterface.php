<?php

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $user): bool;

    public function login(string $username, string $password): ?UserDTO;

    public function getCurrentUser(): ?UserDTO;

    public function isLogged(): bool;

    public function update(UserDTO $user): bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function getAll(): \Generator;
}