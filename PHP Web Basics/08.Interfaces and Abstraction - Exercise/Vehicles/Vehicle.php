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