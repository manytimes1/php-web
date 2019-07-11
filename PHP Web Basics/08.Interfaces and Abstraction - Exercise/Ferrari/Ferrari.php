<?php

class Ferrari implements Car
{
    /**
     * @var string
     */
    private $driverName;

    /**
     * Ferrari constructor.
     * @param string $driverName
     */
    public function __construct(string $driverName)
    {
        $this->setDriverName($driverName);
    }

    /**
     * @return string
     */
    public function getDriverName(): string
    {
        return $this->driverName;
    }

    /**
     * @param string $driverName
     */
    private function setDriverName(string $driverName): void
    {
        $this->driverName = $driverName;
    }

    public function getModel(): string
    {
        return "488-Spider";
    }

    public function useBrakes(): string
    {
        return "Brakes!";
    }

    public function useGasPedal(): string
    {
        return "Zadu6avam sA!";
    }

    public function __toString()
    {
        $result = $this->getModel() . '/';
        $result .= $this->useBrakes() . '/';
        $result .= $this->useGasPedal() . '/';
        $result .= $this->getDriverName();

        return $result;
    }
}