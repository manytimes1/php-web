<?php

namespace App\Service\Town;

use App\Data\TownDTO;
use App\Repository\Town\TownRepositoryInterface;

class TownService implements TownServiceInterface
{
    /**
     * @var TownRepositoryInterface
     */
    private $townRepository;

    public function __construct(TownRepositoryInterface $townRepository)
    {
        $this->townRepository = $townRepository;
    }

    /**
     * @return \Generator|TownDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->townRepository->findAll();
    }

    public function getOneById(int $id): TownDTO
    {
        return $this->townRepository->findOneById($id);
    }
}