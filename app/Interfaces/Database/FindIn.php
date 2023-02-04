<?php

namespace App\Interfaces\Database;

interface FindIn
{
    public function findIn(string $column, array $whereIn): mixed;
}