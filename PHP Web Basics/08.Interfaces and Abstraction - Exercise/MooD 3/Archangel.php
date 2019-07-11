<?php

class Archangel extends Character
{
    /**
     * @var int
     */
    private $mana;

    public function __construct(string $username,
                                int $level,
                                int $mana)
    {
        parent::__construct($username, $level);
        $this->setMana($mana);
        $this->setPassword();
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     */
    private function setMana(int $mana): void
    {
        $this->mana = $mana;
    }

    public function hashPassword()
    {
        return strrev($this->getUsername()) . (strlen($this->getUsername()) * 21);
    }

    private function setPassword(): void
    {
        $this->setHashedPassword($this->hashPassword());
    }

    public function __toString()
    {
        return sprintf("%s%s",
            parent::__toString(),
            $this->getMana() * $this->getLevel()
        );
    }
}