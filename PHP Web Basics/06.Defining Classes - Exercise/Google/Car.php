<?php

class Car
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var int
     */
    private $speed;

    /**
     * Car constructor.
     * @param string $model
     * @param int $speed
     */
    public function __construct(string $model,
                                int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function __toString()
    {
        return $this->getModel() . ' ' . $this->getSpeed();
    }
}