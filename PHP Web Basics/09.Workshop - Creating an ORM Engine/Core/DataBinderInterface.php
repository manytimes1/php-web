<?php

namespace Core;

use App\Data\UserDTO;

interface DataBinderInterface
{
    public function bind(array $from, $className);

}