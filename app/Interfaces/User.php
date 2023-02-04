<?php

namespace App\Interfaces;

use App\Interfaces\Database\Create;
use App\Interfaces\Database\FindByEmail;
use App\Interfaces\Database\Get;
use App\Interfaces\Database\Update;

interface User extends FindByEmail, Create, Get
{
}