<?php

class AnimalFactory implements AnimalFactoryInterface
{
    public static function create(array $data): Animal
    {
        [$type, $name, $weight, $livingRegion] = $data;

        if (!class_exists($type)) {
            throw new Exception('Invalid animal' . PHP_EOL);
        }

        if ($type === 'Cat') {
            $breed = $data[4];

            return new Cat($type, $name, $weight, $livingRegion, $breed);
        }
        return new $type($type, $name, $weight, $livingRegion);
    }
}