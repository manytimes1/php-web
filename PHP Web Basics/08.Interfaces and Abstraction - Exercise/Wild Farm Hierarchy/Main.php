<?php

class Main
{
    private const END_COMMAND = 'End';

    public function run()
    {
        $this->readData();
    }

    private function readData(): void
    {
        $input = readline();

        while ($input !== self::END_COMMAND) {
            $animalData = explode(' ', $input);
            $foodData = explode(' ', readline());

            try {
                $animal = AnimalFactory::create($animalData);
                $food = FoodFactory::create($foodData);
                $animal->makeSound();
                $animal->eat($food);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            echo $animal;
            $input = readline();
        }
    }
}