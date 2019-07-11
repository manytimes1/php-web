<?php
spl_autoload_register();

$name = readline();
$age = intval(readline());
$citizen = new Citizen($name, $age);
echo $citizen;