<?php

class Worker extends Human
{
    /**
     * @var float
     */
    private $weekSalary;

    /**
     * @var float
     */
    private $workHoursPerDay;

    /**
     * @var float
     */
    private $salaryPerHour;

    public function __construct(string $firstName,
                                string $lastName,
                                float $weekSalary,
                                float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setLastName($lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
        $this->setSalaryPerHour();
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    private function setLastName(string $lastName): void
    {
        if (strlen($lastName) <= 3) {
            throw new Exception("Expected length more than 3 symbols!Argument: $lastName");
        }

        $this->lastName = $lastName;
    }

    /**
     * @return float
     */
    public function getWeekSalary()
    {
        return number_format($this->weekSalary, 2, '.', '');
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    private function setWeekSalary(float $weekSalary): void
    {
        if ($weekSalary <= 10) {
            throw new Exception("Expected value mismatch!Argument: $weekSalary");
        }

        $this->weekSalary = $weekSalary;
    }

    /**
     * @return float
     */
    public function getWorkHoursPerDay()
    {
        return number_format($this->workHoursPerDay, 2, '.', '');
    }

    /**
     * @param float $workHoursPerDay
     * @throws Exception
     */
    private function setWorkHoursPerDay(float $workHoursPerDay): void
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: $workHoursPerDay");
        }

        $this->workHoursPerDay = $workHoursPerDay;
    }

    /**
     * @return float
     */
    public function getSalaryPerHour(): float
    {
        return number_format($this->salaryPerHour, 2, '.', '');
    }

    private function setSalaryPerHour(): void
    {
        $this->salaryPerHour = $this->weekSalary / 7 / $this->workHoursPerDay;
    }

    public function __toString()
    {
        $return = parent::__toString();
        $return .= "Week Salary: {$this->getWeekSalary()}" . PHP_EOL;
        $return .= "Hours per day: {$this->getWorkHoursPerDay()}" . PHP_EOL;
        $return .= "Salary per hour: {$this->getSalaryPerHour()}";

        return $return;
    }
}