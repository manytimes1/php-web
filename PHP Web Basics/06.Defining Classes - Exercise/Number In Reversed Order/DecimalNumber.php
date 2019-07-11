<?php

class DecimalNumber
{
    private $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function reverseNumber()
    {
        return strrev($this->number);
    }
}