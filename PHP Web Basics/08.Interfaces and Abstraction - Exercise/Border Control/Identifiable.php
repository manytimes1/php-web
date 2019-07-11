<?php

interface Identifiable
{
    public function isFakeId(string $needle): bool;
}