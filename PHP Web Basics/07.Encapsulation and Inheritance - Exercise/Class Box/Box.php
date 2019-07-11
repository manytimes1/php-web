<?php

class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length,
                                float $width,
                                float $height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getSurfaceArea(): float
    {
        $area = (2 * $this->getLength() * $this->getWidth()) +
            (2 * $this->getLength() * $this->getHeight()) +
            (2 * $this->getWidth() * $this->getHeight());

        return $area;
    }

    public function getLateralSurfaceArea(): float
    {
        $area = (2 * $this->getLength() * $this->getHeight()) +
            (2 * $this->getWidth() * $this->getHeight());

        return $area;
    }

    public function getVolume(): float
    {
        $volume = $this->getLength() * $this->getWidth() * $this->getHeight();
        return $volume;
    }

    public function __toString()
    {
        $surfaceArea = number_format($this->getSurfaceArea(), 2, '.', '');
        $lateralSurfaceArea = number_format($this->getLateralSurfaceArea(), 2, '.', '');
        $volume = number_format($this->getVolume(), 2, '.', '');

        return "Surface Area - $surfaceArea" . PHP_EOL
            . "Lateral Surface Area - $lateralSurfaceArea" . PHP_EOL
            . "Volume - $volume";
    }
}