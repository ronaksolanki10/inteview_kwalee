<?php

namespace App\Repositories;

use App\Interfaces\Wallet as WalletInterface;
use App\Models\Wallet as WalletModel;

class Wallet implements WalletInterface
{
    private WalletModel $model;

    public function __construct(WalletModel $model)
    {
        $this->model =  $model;
    }
    public function create(array $insertableData): void
    {
        $this->model->create($insertableData);
    }
    public function getBalance(int $userId): int
    {
        $balance =  $this->model->where('user_id', $userId)->orderBy('id', 'DESC')->first();

        return empty($balance) ? 0 : $balance->balance;
    }
    public function debit(int $userId, float $amount): void
    {
        $this->create([
            'user_id' => $userId,
            'type' => 'debit',
            'amount' => $amount,
            'balance' => $this->getBalance($userId) - $amount
        ]);
    }
}