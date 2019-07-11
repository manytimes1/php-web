<?php

namespace App\Http;

use App\Data\UserDTO;
use App\Service\User\UserServiceInterface;
use Core\Http\Session\SessionInterface;
use Core\Template\TemplateInterface;
use Core\Util\DataBinderInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface $userService
     */
    private $userService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                SessionInterface $session,
                                UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder, $session);
        $this->userService = $userService;
    }

    public function login(array $formData = [])
    {
        if (isset($formData['login'])) {
            return $this->loginProcess($formData);
        } else {
            return $this->render('user/login');
        }
    }

    public function register(array $formData = [])
    {
        if (isset($formData['register'])) {
            return $this->registerProcess($formData);
        } else {
            return $this->render('user/register');
        }
    }

    public function profile()
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        $currentUser = $this->userService->getCurrentUser();
        return $this->render('user/profile', $currentUser);
    }

    public function logout()
    {
        $this->session->destroy();

        return $this->redirect('login.php');
    }

    private function registerProcess($formData)
    {
        /** @var UserDTO $dto */
        $dto = $this->dataBinder->bind($formData, UserDTO::class);

        try {
            $this->userService->register($dto);
            $this->addFlash("success", "Congratulations, {$dto->getName()}.
            You can now login to our site!");

            return $this->redirect('login.php');
        } catch (\PDOException $e) {
            return $this->render('user/register', $dto,
                [$e->getMessage()]);
        }
    }

    private function loginProcess($formData)
    {
        /** @var UserDTO $user */
        $user = $this->dataBinder->bind($formData, UserDTO::class);

        try {
            $this->userService->login($user->getEmail(), $user->getPassword());
            return $this->redirect('profile.php');
        } catch (\PDOException $e) {
            return $this->render('user/login', $user,
                [$e->getMessage()]);
        }
    }
}