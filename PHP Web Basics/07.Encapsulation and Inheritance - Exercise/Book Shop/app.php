<?php
spl_autoload_register();

$author = readline();
$title = readline();
$price = floatval(readline());
$type = readline();

try {
    switch ($type) {
        case 'STANDARD':
            $book = new Book($title, $author, $price);
            break;
        case 'GOLD':
            $book = new GoldenEditionBook($title, $author, $price);
            break;
        default:
            throw new Exception('Type is not valid!');
            break;
    }
    echo $book;
} catch (Exception $e) {
    echo $e->getMessage();
}