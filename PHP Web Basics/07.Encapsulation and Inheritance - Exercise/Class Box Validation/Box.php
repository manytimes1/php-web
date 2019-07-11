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
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function setLength(float $length): void
    {
        $this->validateData($length, 'Length');
        $this->length = $length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->validateData($width, 'Width');
        $this->width = $width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->validateData($height, 'Height');
        $this->height = $height;
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

    private function validateData(float $var, string $type)
    {
        if ($var <= 0) {
            throw new Exception("$type cannot be zero or negative.");
        }
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