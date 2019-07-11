<?php

abstract class Character implements CharacterInterface
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $hashedPassword;

    /**
     * @var int
     */
    private $level;

    public function __construct(string $username,
                                int $level)
    {
        $this->setUsername($username);
        $this->setLevel($level);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    private function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @param string $hashedPassword
     */
    protected function setHashedPassword(string $hashedPassword): void
    {
        $this->hashedPassword = $hashedPassword;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    private function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function __toString()
    {
        return sprintf("\"%s\" | \"%s\" -> %s\n",
            $this->getUsername(),
            $this->getHashedPassword(),
            get_called_class()
        );
    }
}