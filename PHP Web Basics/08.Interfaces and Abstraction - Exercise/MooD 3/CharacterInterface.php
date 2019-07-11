<?php

interface CharacterInterface
{
    public function getUsername(): string;

    public function getHashedPassword(): string;

    public function getLevel(): int;
}