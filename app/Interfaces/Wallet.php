<?php

namespace App\Interfaces;

use App\Interfaces\Database\Create;

interface Wallet extends Create
{
    public function getBalance(int $userId): int;
    public function debit(int $userId, float $amount): void;
}