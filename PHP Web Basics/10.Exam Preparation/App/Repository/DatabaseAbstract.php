<?php

namespace App\Repository;

use Core\Util\DataBinderInterface;
use Database\DatabaseInterface;

abstract class DatabaseAbstract
{
    /**
     * @var DatabaseInterface
     */
    protected $db;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    public function __construct(DatabaseInterface $db,
                                DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }
}