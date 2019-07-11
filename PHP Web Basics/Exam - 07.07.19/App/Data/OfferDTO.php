<?php

namespace App\Data;

class OfferDTO
{
    private const PICTURE_URL_MIN_LENGTH = 10;
    private const PICTURE_URL_MAX_LENGTH = 10000;

    private const DESCRIPTION_MIN_LENGTH = 10;
    private const DESCRIPTION_MAX_LENGTH = 10000;

    private const DAYS_MIN = 1;

    /**
     * @var int
     */
    private $id;

    private $price;

    /**
     * @var int
     */
    private $days;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $pictureUrl;

    /**
     * @var RoomDTO
     */
    private $room;

    /**
     * @var TownDTO
     */
    private $town;

    /**
     * @var UserDTO
     */
    private $user;

    private $isOccupied;

    /**
     * @var int
     */
    private $roomId;

    /**
     * @var int
     */
    private $townId;

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

    /**
     * @return mixed
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function addTotalPrice()
    {
        $totalPrice = $this->getPrice() * $this->getDays();
        return $totalPrice;
    }

    /**
     * @return int
     */
    public function getDays(): ?int
    {
        return $this->days;
    }

    /**
     * @param int $days
     */
    public function setDays(int $days): void
    {
        if ($days < self::DAYS_MIN) {
            throw new \PDOException("Days must be equal or bigger to " . self::DAYS_MIN . "!");
        }

        $this->days = $days;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
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

    /**
     * @return string
     */
    public function getPictureUrl(): ?string
    {
        return $this->pictureUrl;
    }

    /**
     * @param string $pictureUrl
     */
    public function setPictureUrl(string $pictureUrl): void
    {
        DTOValidator::validate(
            self::PICTURE_URL_MIN_LENGTH,
            self::PICTURE_URL_MAX_LENGTH,
            $pictureUrl,
            "text",
            "Image URL"
        );

        $this->pictureUrl = $pictureUrl;
    }

    /**
     * @return RoomDTO
     */
    public function getRoom(): RoomDTO
    {
        return $this->room;
    }

    /**
     * @param RoomDTO $room
     */
    public function setRoom(RoomDTO $room): void
    {
        $this->room = $room;
    }

    /**
     * @return TownDTO
     */
    public function getTown(): TownDTO
    {
        return $this->town;
    }

    /**
     * @param TownDTO $town
     */
    public function setTown(TownDTO $town): void
    {
        $this->town = $town;
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

    public function getIsOccupied()
    {
        return $this->isOccupied;
    }

    public function setIsOccupied($isOccupied)
    {
        $this->isOccupied = $isOccupied;
    }

    /**
     * @return int
     */
    public function getRoomId(): ?int
    {
        return $this->roomId;
    }

    /**
     * @param int $roomId
     */
    public function setRoomId(int $roomId): void
    {
        $this->roomId = $roomId;
    }

    /**
     * @return int
     */
    public function getTownId(): ?int
    {
        return $this->townId;
    }

    /**
     * @param int $townId
     */
    public function setTownId(int $townId): void
    {
        $this->townId = $townId;
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