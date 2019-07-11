<?php

namespace App\Repository\Offer;

use App\Data\OfferDTO;

interface OfferRepositoryInterface
{
    public function insert(OfferDTO $offerDTO): bool;

    public function update(OfferDTO $itemDTO, int $id): bool;

    public function delete(int $id): bool;

    public function changeStatus(OfferDTO $offerDTO, int $id): bool;

    /**
     * @return \Generator|OfferDTO[]
     */
    public function findAll(): \Generator;

    public function findOneById(int $id): OfferDTO;

    public function findAllByAuthorId(int $id): \Generator;
}