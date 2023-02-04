<?php

namespace App\Interfaces;

use App\Interfaces\Database\Create;
use App\Interfaces\Database\FindWhere;

interface UserInventoryItem extends FindWhere, Create
{
}