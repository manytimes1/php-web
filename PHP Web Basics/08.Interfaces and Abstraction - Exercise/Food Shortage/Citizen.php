<?php

class Citizen extends Person
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $birthdate;

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthdate
     * @throws Exception
     */
    public function __construct(string $name,
                                int $age,
                                string $id,
                                string $birthdate)
    {
        parent::__construct($name, $age);
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function getFood(): int
    {
        return $this->food;
    }

    public function BuyFood(): int
    {
        return $this->food += 10;
    }
}