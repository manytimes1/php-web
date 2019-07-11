<?php
spl_autoload_register();

$phoneNumbers = explode(" ", readline());
$sites = explode(" ", readline());
$phone = new Smartphone();

foreach ($phoneNumbers as $phoneNumber) {
    try {
        echo $phone->call($phoneNumber) . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

foreach ($sites as $site) {
    try {
        echo $phone->browse($site) . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}