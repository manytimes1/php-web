<?php

class GoldenEditionBook extends Book
{
    private const SET_PRICE = 1.3;

    public function __construct(string $title,
                                string $author,
                                float $price)
    {
        parent::__construct($title, $author,self::SET_PRICE * $price);
    }
}