<?php

class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct(string $model,
                                int $power,
                                string $displacement = 'n/a',
                                string $efficiency = 'n/a')
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    public function setDisplacement(string $displacement): void
    {
        $this->displacement = $displacement;
    }

    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    public function setEfficiency(string $efficiency): void
    {
        $this->efficiency = $efficiency;
    }
}