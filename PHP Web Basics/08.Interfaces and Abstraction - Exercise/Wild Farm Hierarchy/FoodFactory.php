<?php

class FoodFactory implements FoodFactoryInterface
{
    public static function create(array $data): Food
    {
        [$type, $quantity] = $data;

        if (!class_exists($type)) {
            throw new Exception('Invalid food type' . PHP_EOL);
        }
        return new $type($quantity);
    }
}