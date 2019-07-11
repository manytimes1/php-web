<?php
require_once 'common.php';

$homeHandler = new App\Http\HomeHttpHandler($template, $dataBinder, $session);
$homeHandler->index($userService);