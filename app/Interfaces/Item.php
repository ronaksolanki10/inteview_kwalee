<?php

namespace App\Interfaces;

use App\Interfaces\Database\Create;
use App\Interfaces\Database\Find;
use App\Interfaces\Database\FindIn;
use App\Interfaces\Database\Get;

interface Item extends Create, Get, Find, FindIn
{
}