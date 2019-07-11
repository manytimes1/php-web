<?php

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function login(UserService $userService,
                          array $formData = [])
    {
        if (isset($formData['login'])) {
            /** @var UserDTO $formBind */
            $formBind = $this->dataBinder->bind($formData, UserDTO::class);
            $currentUser = $userService->login($formBind->getUsername(), $formBind->getPassword());

            if (!is_null($currentUser)) {
                $_SESSION['id'] = $currentUser->getId();
                $this->redirect('profile.php');
            } else {
                $this->render('user/login', $formBind,
                    [new ErrorDTO("Username does not exist or password mismatch.")]
                );
            }
        }

        return $this->render('user/login');
    }

    public function register(UserServiceInterface $userService,
                             array $formData = [])
    {
        if (isset($formData['register'])) {
            $user = $this->dataBinder->bind($formData, UserDTO::class);

            if ($userService->register($user)) {
                $this->redirect('login.php');
            } else {
                return $this->render('user/register', $user,
                    [new ErrorDTO("Username is already taken or password mismatch.")]
                );
            }
        }

        return $this->render('user/register');
    }

    public function logout()
    {
        session_destroy();

        $this->redirect('login.php');
    }

    public function profile(UserServiceInterface $userService,
                            array $formData = [])
    {
        if (!$userService->isLogged()) {
            $this->redirect('login.php');
        }

        if (isset($formData['edit'])) {
            $currentUser = $this->dataBinder->bind($formData, UserDTO::class);

            if ($userService->update($currentUser)) {
                $this->redirect('profile.php');
            }
        }

        return $this->render('user/profile', $userService->getCurrentUser());
    }

    public function allUsers(UserServiceInterface $userService)
    {
        if (!$userService->isLogged()) {
            $this->redirect('login.php');
        }

        return $this->render('user/all', $userService->getAll());
    }
}