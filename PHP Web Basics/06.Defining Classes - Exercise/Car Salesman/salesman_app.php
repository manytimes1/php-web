<?php
require_once 'Engine.php';
require_once 'Car.php';

$enginesCount = trim(readline());
$engines = [];
$cars = [];

for ($i = 0; $i < $enginesCount; $i++) {
    $data = explode(' ', trim(readline()));
    $engine = new Engine($data[0], $data[1]);

    if (count($data) > 2) {
        for ($j = 2; $j < count($data); $j++) {
            $currentData = $data[$j];

            if (is_numeric($currentData)) {
                $engine->setDisplacement(intval($currentData));
            } else {
                $engine->setEfficiency($currentData);
            }
        }
    }
    $engines[] = $engine;
}

$carsCount = trim(readline());

for ($i = 0; $i < $carsCount; $i++) {
    $data = explode(' ', trim(readline()));

    foreach ($engines as $engine) {
        if ($engine->getModel() === $data[1]) {
            $carEngine = $engine;
        }
    }
    $car = new Car($data[0], $carEngine);

    if (count($data) > 2) {
        for ($j = 2; $j < count($data); $j++) {
            $currentData = $data[$j];

            if (is_numeric($currentData)) {
                $car->setWeight(intval($currentData));
            } else {
                $car->setColor($currentData);
            }
        }
    }
    $cars[] = $car;
}

foreach ($cars as $car) {
    echo $car;
}