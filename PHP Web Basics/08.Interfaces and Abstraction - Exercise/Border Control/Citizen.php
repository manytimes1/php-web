<?php

class Citizen implements Identifiable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $id;

    public function __construct(string $name,
                                int $age,
                                string $id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function isFakeId(string $needle): bool
    {
        $length = strlen($needle);

        if ($length == 0) {
            return true;
        }
        return substr($this->getId(), -$length) === $needle;
    }

    public function __toString()
    {
        return $this->getId() . PHP_EOL;
    }
}