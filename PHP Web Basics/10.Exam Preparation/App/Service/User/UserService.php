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
            ->findOneByUsername($userDTO->getUsername());

        if ($existingUser) {
            throw new \PDOException("Username already taken!");
        }

        DTOValidator::validate(
            UserDTO::USERNAME_MIN_LENGTH,
            UserDTO::FIELDS_MAX_LENGTH,
            $userDTO->getUsername(),
            "text",
            "Username"
        );

        DTOValidator::validate(
            UserDTO::PASSWORD_MIN_LENGTH,
            UserDTO::FIELDS_MAX_LENGTH,
            $userDTO->getPassword(),
            "text",
            "Password"
        );

        if ($userDTO->getPassword() !== $userDTO->getConfirmPassword()) {
            throw new \PDOException("Passwords mismatch!");
        }

        DTOValidator::validate(
            UserDTO::FULL_NAME_MIN_LENGTH,
            UserDTO::FIELDS_MAX_LENGTH,
            $userDTO->getFullName(),
            "text",
            "Full Name"
        );

        DTOValidator::validate(
            UserDTO::LOCATION_MIN_LENGTH,
            UserDTO::FIELDS_MAX_LENGTH,
            $userDTO->getLocation(),
            "text",
            "Location"
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

    public function login(string $username, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByUsername($username);

        if (is_null($currentUser)) {
            throw new \PDOException("Your username does not exist.
            You might want to <a href='register.php'>register</a> first?");
        }

        if (!$this->encryptionService->verify($password, $currentUser->getPassword())) {
            throw new \PDOException("Invalid password!");
        }

        $this->session->setAttribute(self::SESSION_USER_ID, $currentUser->getId());

        return $currentUser;
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