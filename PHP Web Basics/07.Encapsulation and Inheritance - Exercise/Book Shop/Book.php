<?php

class Book
{
    private $title;
    private $author;
    private $price;

    public function __construct(string $title,
                                string $author,
                                float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws Exception
     */
    private function setTitle(string $title): void
    {
        if (strlen($title) < 3) {
            throw new Exception('Title not valid!');
        }

        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @throws Exception
     */
    private function setAuthor(string $author): void
    {
        [$firstName, $lastName] = explode(' ', $author);

        if ($lastName && is_numeric($lastName[0])) {
            throw new Exception('Author not valid!');
        }

        $this->author = $author;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @throws Exception
     */
    private function setPrice(float $price): void
    {
        if ($price <= 0) {
            throw new Exception('Price not valid!');
        }

        $this->price = $price;
    }

    public function __toString()
    {
        return 'OK' . PHP_EOL . $this->price;
    }
}