<?php
session_start();
spl_autoload_register();

$session = new Core\Http\Session\Session($_SESSION);
$template = new Core\Template\Template($session);
$dataBinder = new Core\Util\DataBinder();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new Database\PDODatabase($pdo);

$userRepository = new App\Repository\User\UserRepository($db, $dataBinder);
$categoryRepository = new App\Repository\Category\CategoryRepository($db, $dataBinder);
$itemRepository = new App\Repository\Item\ItemRepository($db, $dataBinder);
$encryptionService = new App\Service\Encryption\ArgonEncryptionService();
$userService = new App\Service\User\UserService($userRepository, $encryptionService, $session);
$categoryService = new App\Service\Category\CategoryService($categoryRepository);
$itemService = new App\Service\Item\ItemService($itemRepository, $userService);
$userHandler = new App\Http\UserHttpHandler($template, $dataBinder, $session, $userService);
$itemHandler = new App\Http\ItemHttpHandler($template, $dataBinder, $session,
    $itemService, $categoryService, $userService);