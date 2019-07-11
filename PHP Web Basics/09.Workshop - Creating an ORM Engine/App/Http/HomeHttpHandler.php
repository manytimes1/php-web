<?php

namespace App\Http;


use App\Service\UserServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        if ($userService->isLogged()) {
            $this->redirect('profile.php');
        }

        return $this->render('home/index');
    }
}