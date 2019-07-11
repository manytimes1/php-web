<?php

class Tiger extends Felime
{
    private const FOOD_TYPE = 'Meat';

    public function __construct(string $name,
                                string $type,
                                float $weight,
                                string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "ROAAR!!!" . PHP_EOL;
    }

    public function eat(Food $food): void
    {
        if ($food->getFoodType() !== self::FOOD_TYPE) {
            throw new Exception($this->getClassName() . 's are not eating that type of food!' . PHP_EOL);
        }

        $this->setFoodEaten($food->getQuantity());
    }
}