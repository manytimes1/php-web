<?php

abstract class Vehicle
{
    /**
     * @var float
     */
    private $fuel;

    /**
     * @var float
     */
    private $consumption;

    /**
     * Vehicle constructor.
     * @param float $fuel
     * @param float $consumption
     */
    protected function __construct(float $fuel,
                                   float $consumption)
    {
        $this->setFuel($fuel);
        $this->setConsumption($consumption);
    }

    /**
     * @return float
     */
    public function getFuel(): float
    {
        return $this->fuel;
    }

    /**
     * @param float $fuel
     */
    private function setFuel(float $fuel): void
    {
        $this->fuel = $fuel;
    }

    /**
     * @return float
     */
    public function getConsumption(): float
    {
        return $this->consumption;
    }

    /**
     * @param float $consumption
     */
    private function setConsumption(float $consumption): void
    {
        $this->consumption = $consumption;
    }

    public function refuel($fuel)
    {
        $this->fuel += $fuel;
    }

    public function drive(float $distance) {
        $neededFuel = $this->getConsumption() * $distance;
        $type = get_called_class();

        if ($this->getFuel() < $neededFuel) {
            throw new Exception("{$type} needs refueling");
        }

        $this->fuel -= $neededFuel;
        echo "$type travelled $distance km" . PHP_EOL;
    }

    public function __toString()
    {
        $fuelFormat = number_format($this->getFuel(), 2, '.', '');
        $type = get_called_class();
        return "{$type}: {$fuelFormat}";
    }
}

class Car extends Vehicle
{
    public function __construct(float $fuel,
                                float $consumption)
    {
        parent::__construct($fuel, $consumption + 0.9);
    }
}

class Truck extends Vehicle
{
    public function __construct(float $fuel,
                                float $consumption)
    {
        parent::__construct($fuel, $consumption + 1.6);
    }

    public function refuel($fuel)
    {
        parent::refuel($fuel * 0.95);
    }
}

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