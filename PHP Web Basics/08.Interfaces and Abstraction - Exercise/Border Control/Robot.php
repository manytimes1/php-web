<?php

class Robot implements Identifiable
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $id;

    public function __construct(string $model,
                                string $id)
    {
        $this->model = $model;
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