<?php

namespace App\Http;

use App\Service\User\UserServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        if ($userService->isLogged()) {
            return $this->redirect('profile.php');
        } else {
            return $this->render('home/index');
        }
    }
}