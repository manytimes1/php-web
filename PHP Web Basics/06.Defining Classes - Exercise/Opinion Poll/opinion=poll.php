<?php
require_once 'Person.php';

$lines = intval(readline());
$persons = [];

for ($i = 0; $i < $lines; $i++) {
    $data = explode(' ', readline());
    $name = $data[0];
    $age = intval($data[1]);
    $persons[] = new Person($name, $age);
}

$filteredPeople = array_filter($persons, function (Person $person) {
    return $person->getAge() > 30;
});

usort($filteredPeople, function (Person $p1, Person $p2) {
    return $p1->getName() <=> $p2->getName();
});

foreach ($filteredPeople as $person) {
    echo $person . PHP_EOL;
}