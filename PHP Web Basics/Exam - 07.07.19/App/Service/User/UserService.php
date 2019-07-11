<?php

namespace App\Service\User;

use App\Data\DTOValidator;
use App\Data\UserDTO;
use App\Repository\User\UserRepositoryInterface;
use App\Service\Encryption\EncryptionServiceInterface;
use Core\Http\Session\SessionInterface;

class UserService implements UserServiceInterface
{
    const SESSION_USER_ID = 'id';

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(UserRepositoryInterface $userRepository,
                                EncryptionServiceInterface $encryptionService,
                                SessionInterface $session)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
        $this->session = $session;
    }

    public function register(UserDTO $userDTO): bool
    {
        $existingUser = $this->userRepository
            ->findOneByEmail($userDTO->getEmail());

        if ($existingUser) {
            throw new \PDOException("Email already taken!");
        }

        if (!filter_var($userDTO->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new \PDOException("Please a enter valid email!");
        }

        DTOValidator::validate(
            UserDTO::PASSWORD_MIN_LENGTH,
            UserDTO::FIELDS_MAX_LENGTH,
            $userDTO->getPassword(),
            "text",
            "Password"
        );

        if ($userDTO->getPassword() !== $userDTO->getConfirmPassword()) {
            throw new \PDOException("Password Mismatch!");
        }

        DTOValidator::validate(
            UserDTO::NAME_MIN_LENGTH,
            UserDTO::FIELDS_MAX_LENGTH,
            $userDTO->getName(),
            "text",
            "Name"
        );

        DTOValidator::validate(
            UserDTO::PHONE_MIN_LENGTH,
            UserDTO::FIELDS_MAX_LENGTH,
            $userDTO->getPhone(),
            "text",
            "Phone"
        );

        $hashPassword = $this->encryptionService->hash($userDTO->getPassword());
        $userDTO->setPassword($hashPassword);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $email, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByEmail($email);

        if (is_null($currentUser)) {
            throw new \PDOException("This Email is not registered in our site!");
        }

        if (!$this->encryptionService->verify($password, $currentUser->getPassword())) {
            throw new \PDOException("Invalid password!");
        }

        $this->session->setAttribute(self::SESSION_USER_ID, $currentUser->getId());

        return $currentUser;
    }

    public function updateSpentMoney(UserDTO $userDTO, int $id): bool
    {
        return $this->userRepository->moneySpent($userDTO, $id);
    }

    public function getCurrentUser(): ?UserDTO
    {
        return $this->userRepository
                ->findOne(intval($this->session
                ->getAttribute(self::SESSION_USER_ID)));
    }

    public function isLogged(): bool
    {
        if (!$this->getCurrentUser()) {
            return false;
        }
        return true;
    }
}