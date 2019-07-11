<?php
spl_autoload_register();

[$car, $fuelQuantity, $fuelConsumption] = explode(' ', readline());
$car = new Car($fuelQuantity, $fuelConsumption);

[$truck, $fuelQuantity, $fuelConsumption] = explode(' ', readline());
$truck = new Truck($fuelQuantity, $fuelConsumption);

$n = intval(readline());
for ($i = 0; $i < $n; $i++) {
    try {
        [$command, $type, $data] = explode(' ', readline());
        $vehicle = null;
        if ($type === 'Car') {
            $vehicle = $car;
        } else {
            $vehicle = $truck;
        }
        $vehicle->$command($data);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}
echo $car . PHP_EOL;
echo $truck;