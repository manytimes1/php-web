<?php

interface FoodFactoryInterface
{
    public static function create(array $data): Food;
}