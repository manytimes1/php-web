<?php

namespace App\Data;

class ItemDTO
{
    private const TITLE_MIN_LENGTH = 3;
    private const TITLE_MAX_LENGTH = 255;

    private const PRICE_MIN = 1;
    private const PRICE_MAX = 50;

    private const DESCRIPTION_MIN_LENGTH = 10;
    private const DESCRIPTION_MAX_LENGTH = 10000;

    private CONST IMAGE_MIN_LENGTH = 3;
    private CONST IMAGE_MAX_LENGTH = 255;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $image;

    /**
     * @var CategoryDTO
     */
    private $category;

    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var int
     */
    private $userId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        DTOValidator::validate(
            self::TITLE_MIN_LENGTH,
            self::TITLE_MAX_LENGTH,
            $title,
            "text",
            "Title"
        );

        $this->title = $title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        DTOValidator::validate(
            self::DESCRIPTION_MIN_LENGTH,
            self::DESCRIPTION_MAX_LENGTH,
            $description,
            "text",
            "Description"
        );

        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        DTOValidator::validate(
            self::IMAGE_MIN_LENGTH,
            self::IMAGE_MAX_LENGTH,
            $image,
            "text",
            "Image"
        );

        $this->image = $image;
    }

    /**
     * @return CategoryDTO
     */
    public function getCategory(): CategoryDTO
    {
        return $this->category;
    }

    /**
     * @param CategoryDTO $category
     */
    public function setCategory(CategoryDTO $category): void
    {
        $this->category = $category;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}