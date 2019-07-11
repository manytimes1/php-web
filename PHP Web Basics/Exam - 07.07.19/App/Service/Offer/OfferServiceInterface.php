<?php

namespace App\Service\Offer;

use App\Data\OfferDTO;

interface OfferServiceInterface
{
    public function create(OfferDTO $offerDTO): bool;

    public function edit(OfferDTO $offerDTO, int $id): bool;

    public function erase(int $id): bool;

    public function rent(OfferDTO $offerDTO, int $id): bool;

    /**
     * @return \Generator|OfferDTO[]
     */
    public function getAll(): \Generator;

    public function getOneById(int $id) : OfferDTO;

    public function getAllByAuthor();
}