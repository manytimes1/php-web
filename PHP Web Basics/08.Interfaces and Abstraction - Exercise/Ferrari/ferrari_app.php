<?php
spl_autoload_register();

$driverName = readline();
$car = new Ferrari($driverName);
echo $car;