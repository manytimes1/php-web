<?php
spl_autoload_register();

$input = readline();
$entries = [];

while ($input !== 'End') {
    $data = explode(" ", $input);

    if (count($data) == 3) {
        [$name, $age, $id] = $data;
        $entries[] = new Citizen($name, $age, $id);
    } elseif (count($data) == 2) {
        [$model, $id] = $data;
        $entries[] = new Robot($model, $id);
    }

    $input = readline();
}

$detainedIds = readline();

foreach ($entries as $entry) {
    if ($entry->isFakeId($detainedIds)) {
        echo $entry;
    }
}