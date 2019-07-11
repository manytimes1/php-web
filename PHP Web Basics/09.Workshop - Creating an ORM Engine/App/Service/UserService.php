<?php

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;
use App\Service\Encryption\EncryptionServiceInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    public function __construct(UserRepositoryInterface $userRepository,
                                EncryptionServiceInterface $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }

    public function register(UserDTO $user): bool
    {
        $existUser = $this->userRepository->findOneByUsername($user->getUsername());

        if (null !== $existUser) {
            return false;
        }

        if ($user->getPassword() !== $user->getConfirmPassword()) {
            return false;
        }

        $user->setPassword($this->encryptionService->hash($user->getPassword()));

        return $this->userRepository->insert($user);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $user = $this->userRepository->findOneByUsername($username);

        if (is_null($user)) {
            return null;
        }

        if (!$this->encryptionService->verify($password, $user->getPassword())) {
            return null;
        }

        return $user;
    }

    public function getCurrentUser(): ?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }

        return $this->userRepository->findOneById(intval($_SESSION['id']));
    }

    public function isLogged(): bool
    {
        if (!$this->getCurrentUser()) {
            return false;
        }

        return true;
    }

    public function update(UserDTO $user): bool
    {
        if (!is_null($this->userRepository->findOneByUsername($user->getUsername()))) {
            return false;
        }

        $user->setPassword($this->encryptionService->hash($user->getPassword()));
        return $this->userRepository->update($_SESSION['id'], $user);
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->userRepository->findAll();
    }
}