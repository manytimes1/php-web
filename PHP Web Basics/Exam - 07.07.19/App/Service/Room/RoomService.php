<?php

namespace App\Service\Room;

use App\Data\RoomDTO;
use App\Repository\Room\RoomRepositoryInterface;

class RoomService implements RoomServiceInterface
{
    /**
     * @var RoomRepositoryInterface
     */
    private $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getAll(): \Generator
    {
        return $this->roomRepository->findAll();
    }

    public function getOneById(int $id): RoomDTO
    {
        return $this->roomRepository->findOneById($id);
    }
}