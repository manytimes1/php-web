<?php

class Rebel extends Person
{
    /**
     * @var string
     */
    private $group;

    /**
     * Rebel constructor.
     * @param string $name
     * @param int $age
     * @param string $group
     * @throws Exception
     */
    public function __construct(string $name,
                                int $age,
                                string $group)
    {
        parent::__construct($name, $age);
        $this->group = $group;
    }

    public function getFood(): int
    {
        return $this->food;
    }

    public function BuyFood(): int
    {
        return $this->food += 5;
    }
}