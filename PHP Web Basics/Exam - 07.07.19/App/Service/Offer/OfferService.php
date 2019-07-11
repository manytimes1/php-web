<?php

namespace App\Service\Offer;

use App\Data\OfferDTO;
use App\Repository\Offer\OfferRepositoryInterface;
use App\Service\User\UserServiceInterface;

class OfferService implements OfferServiceInterface
{
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(OfferRepositoryInterface $offerRepository,
                                UserServiceInterface $userService)
    {
        $this->offerRepository = $offerRepository;
        $this->userService = $userService;
    }

    public function create(OfferDTO $offerDTO): bool
    {
        return $this->offerRepository->insert($offerDTO);
    }

    public function edit(OfferDTO $offerDTO, int $id): bool
    {
        return $this->offerRepository->update($offerDTO, $id);
    }

    public function erase(int $id): bool
    {
        return $this->offerRepository->delete($id);
    }

    public function rent(OfferDTO $offerDTO, int $id): bool
    {
        return $this->offerRepository->changeStatus($offerDTO, $id);
    }

    public function getAll(): \Generator
    {
        return $this->offerRepository->findAll();
    }

    public function getOneById(int $id): OfferDTO
    {
        return $this->offerRepository->findOneById($id);
    }

    public function getAllByAuthor()
    {
        $currentUser = $this->userService->getCurrentUser();

        return $this->offerRepository->findAllByAuthorId($currentUser->getId());
    }
}