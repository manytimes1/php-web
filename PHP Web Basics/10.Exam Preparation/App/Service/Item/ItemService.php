<?php

namespace App\Service\Item;

use App\Data\ItemDTO;
use App\Repository\Item\ItemRepositoryInterface;
use App\Service\User\UserServiceInterface;

class ItemService implements ItemServiceInterface
{
    /**
     * @var ItemRepositoryInterface
     */
    private $itemRepository;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(ItemRepositoryInterface $bookRepository,
                                UserServiceInterface $userService)
    {
        $this->itemRepository = $bookRepository;
        $this->userService = $userService;
    }

    public function create(ItemDTO $itemDTO): bool
    {
        return $this->itemRepository->insert($itemDTO);
    }

    public function edit(ItemDTO $itemDTO, int $id): bool
    {
        return $this->itemRepository->update($itemDTO, $id);
    }

    public function erase(int $id): bool
    {
        return $this->itemRepository->delete($id);
    }

    public function getAll(): \Generator
    {
        return $this->itemRepository->findAll();
    }

    public function getOneById(int $id): ItemDTO
    {
        return $this->itemRepository->findOneById($id);
    }

    public function getAllByAuthor()
    {
        $currentUser = $this->userService->getCurrentUser();

        return $this->itemRepository->findAllByAuthorId($currentUser->getId());
    }
}