<?php
spl_autoload_register();

$people = [];

while (($input = readline()) !== 'End') {
    $data = explode(' ', $input);
    [$name, $type] = $data;

    if (!key_exists($name, $people)) {
        $people[$name] = new Person($name);
    }

    switch ($type) {
        case 'company':
            $company = new Company($data[2], $data[3], $data[4]);
            $people[$name]->setCompany($company);
            break;
        case 'pokemon':
            $pokemon = new Pokemon($data[2], $data[3]);
            $people[$name]->addPokemon($pokemon);
            break;
        case 'parents':
            $parent = new Relative($data[2], $data[3]);
            $people[$name]->addParent($parent);
            break;
        case 'children':
            $child = new Child($data[2], $data[3]);
            $people[$name]->addChild($child);
            break;
        case 'car':
            $car = new Car($data[2], $data[3]);
            $people[$name]->setCar($car);
            break;
    }
}

$personName = readline();
echo $people[$personName];