<?php

class Cat extends Felime
{
    /**
     * @var string
     */
    private $breed;

    public function __construct(string $name,
                                string $type,
                                float $weight,
                                string $livingRegion,
                                string $breed)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->setBreed($breed);
    }

    /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    private function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }

    public function makeSound(): void
    {
        echo "Meowwww" . PHP_EOL;
    }

    public function eat(Food $food): void
    {
        $this->setFoodEaten($food->getQuantity());
    }

    public function __toString(): string
    {
        return sprintf("%s[%s, %s, %g, %s, %d]\n",
            $this->getType(),
            $this->getName(),
            $this->getBreed(),
            $this->getWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}