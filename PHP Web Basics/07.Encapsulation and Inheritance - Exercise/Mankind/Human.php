<?php

class Human
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName,
                                string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    private function setFirstName(string $firstName): void
    {
        if (!$this->isCorrectName($firstName)) {
            throw new Exception("Expected upper case letter!Argument: $firstName \n");
        }

        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: $firstName \n");
        }

        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    private function setLastName(string $lastName): void
    {
        if (!$this->isCorrectName($lastName)) {
            throw new Exception("Expected upper case letter!Argument: $lastName \n");
        }

        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: $lastName \n");
        }

        $this->lastName = $lastName;
    }

    private function isCorrectName(string $name): bool
    {
        return $name[0] === strtoupper($name[0]);
    }

    public function __toString()
    {
        $result = "First Name: {$this->getFirstName()}" . PHP_EOL;
        $result .= "Last Name: {$this->getLastName()}" . PHP_EOL;

        return $result;
    }
}