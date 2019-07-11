<?php

class Car extends Vehicle
{
    public function __construct(float $fuel,
                                float $consumption)
    {
        parent::__construct($fuel, $consumption + 0.9);
    }
}