<?php
spl_autoload_register();

$persons = getPersons();
$products = getProducts();

while (($input = readline()) !== 'END') {
    $data = explode(' ', $input);
    [$personName, $productName] = $data;

    if (key_exists($personName, $persons) &&
        key_exists($productName, $products)) {
        /** @var Person $person */
        $person = $persons[$personName];

        try {
            $person->buyProduct($products[$productName]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

foreach ($persons as $person) {
    echo $person;
}

function getPersons(): array
{
    $personInput = preg_split('/[=;]/', readline());
    $persons = [];

    for ($i = 0; $i < count($personInput) - 1; $i += 2) {
        $name = $personInput[$i];
        $money = floatval($personInput[$i + 1]);

        try {
            $persons[$name] = new Person($name, $money);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    return $persons;
}

function getProducts(): array
{
    $productInput = preg_split('/[=;]/', readline(), -1, PREG_SPLIT_NO_EMPTY);
    $products = [];

    for ($i = 0; $i < count($productInput) - 1; $i += 2) {
        $name = $productInput[$i];
        $cost = $productInput[$i + 1];
        $products[$name] = new Product($name, $cost);
    }
    return $products;
}