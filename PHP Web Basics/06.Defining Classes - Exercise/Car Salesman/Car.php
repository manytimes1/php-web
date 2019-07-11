<?php

class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model,
                                Engine $engine,
                                string $weight = 'n/a',
                                string $color = 'n/a')
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function __toString()
    {
        $result = $this->getModel() . ':' . PHP_EOL;
        $result .= ' ' . $this->engine->getModel() . ':' . PHP_EOL;
        $result .= '  Power: '. $this->engine->getPower() . PHP_EOL;
        $result .= '  Displacement: ' . $this->engine->getDisplacement() . PHP_EOL;
        $result .= '  Efficiency: ' . $this->engine->getEfficiency() . PHP_EOL;
        $result .= ' Weight: ' . $this->getWeight() . PHP_EOL;
        $result .= ' Color: ' . $this->getColor() . PHP_EOL;

        return $result;
    }
}