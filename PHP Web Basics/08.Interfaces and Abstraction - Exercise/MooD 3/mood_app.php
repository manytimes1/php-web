<?php
spl_autoload_register();

$data = explode(' | ', readline());
[$username, $type, $specialPoints, $level] = $data;
$character = new $type($username, $level, $specialPoints);
echo $character;