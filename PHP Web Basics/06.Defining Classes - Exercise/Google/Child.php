<?php

class Child
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $birthday;

    /**
     * Child constructor.
     * @param string $name
     * @param string $birthday
     */
    public function __construct(string $name,
                                string $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function __toString()
    {
        return $this->getName() . ' ' . $this->getBirthday();
    }
}