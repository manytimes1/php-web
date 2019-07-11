<?php

abstract class Person implements Buyer
{
    protected $name;
    protected $age;
    protected $food = 0;

    protected function __construct(string $name,
                                   int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}