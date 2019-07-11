<?php
spl_autoload_register();

$n = readline();
$people = [];

for ($i = 0; $i < $n; $i++) {
    $input = explode(" ", readline());
    $name = $input[0];
    $age = intval($input[1]);

    if (count($input) == 4) {
        $id = $input[2];
        $birthdate = $input[3];
        $people[$name] = new Citizen($name, $age, $id, $birthdate);
    } elseif (count($input) == 3) {
        $group = $input[2];
        $people[$name] = new Rebel($name, $age, $group);
    }
}

$line = readline();
$amountFood = [];

while ($line !== 'End') {
    if (key_exists($line, $people)) {
        $person = $people[$line];
        $person->BuyFood();

        $amountFood[$line] = $person->getFood();
    }
    $line = readline();
}
echo array_sum($amountFood);