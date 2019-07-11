<?php

class Demon extends Character
{
    /**
     * @var float
     */
    private $energy;

    public function __construct(string $username,
                                int $level,
                                float $energy)
    {
        parent::__construct($username, $level);
        $this->setEnergy($energy);
        $this->setPassword();
    }

    /**
     * @return float
     */
    public function getEnergy(): float
    {
        return $this->energy;
    }

    /**
     * @param float $energy
     */
    private function setEnergy(float $energy): void
    {
        $this->energy = $energy;
    }

    public function hashPassword(): string
    {
        return strlen($this->getUsername()) * 217;
    }

    private function setPassword(): void
    {
        $this->setHashedPassword($this->hashPassword());
    }

    public function __toString()
    {
        return sprintf("%s%.1f",
            parent::__toString(),
            $this->getEnergy() * $this->getLevel()
        );
    }
}