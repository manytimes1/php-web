<?php

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