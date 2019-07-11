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
$townRepository = new App\Repository\Town\TownRepository($db, $dataBinder);
$roomRepository = new App\Repository\Room\RoomRepository($db, $dataBinder);
$offerRepository = new App\Repository\Offer\OfferRepository($db, $dataBinder);
$encryptionService = new App\Service\Encryption\ArgonEncryptionService();
$userService = new App\Service\User\UserService($userRepository, $encryptionService, $session);
$townService = new App\Service\Town\TownService($townRepository);
$roomService = new App\Service\Room\RoomService($roomRepository);
$offerService = new App\Service\Offer\OfferService($offerRepository, $userService);
$userHandler = new App\Http\UserHttpHandler($template, $dataBinder, $session, $userService);
$offerHandler = new App\Http\OfferHttpHandler($template, $dataBinder, $session,
    $offerService, $townService, $roomService, $userService);