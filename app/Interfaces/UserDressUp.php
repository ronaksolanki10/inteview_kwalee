<?php

namespace App\Interfaces;

use App\Interfaces\Database\Create;
use App\Interfaces\Database\FindWhere;

interface UserDressUp extends FindWhere, Create
{
    public function makeAllNonCurrent(int $userId): void;
}