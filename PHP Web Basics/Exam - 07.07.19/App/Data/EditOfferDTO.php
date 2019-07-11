<?php

namespace App\Data;

class EditOfferDTO
{
    /**
     * @var OfferDTO
     */
    private $offer;

    /**
     * @var TownDTO[]
     */
    private $towns;

    /**
     * @var RoomDTO[]
     */
    private $rooms;

    /**
     * @return OfferDTO
     */
    public function getOffer(): OfferDTO
    {
        return $this->offer;
    }

    /**
     * @param OfferDTO $offer
     */
    public function setOffer(OfferDTO $offer): void
    {
        $this->offer = $offer;
    }

    /**
     * @return TownDTO[]
     */
    public function getTowns()
    {
        return $this->towns;
    }

    public function setTowns($towns)
    {
        $this->towns = $towns;
    }

    /**
     * @return RoomDTO[]
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }
}