<?php

namespace Database\Seeders;

use App\Interfaces\User as UserInterface;
use App\Interfaces\Wallet as WalletInterface;
use Illuminate\Database\Seeder;

class InitialWalletBalance extends Seeder
{
    private WalletInterface $wallet;
    private UserInterface $user;

    public function __construct(WalletInterface $wallet, UserInterface $user)
    {
        $this->wallet = $wallet;
        $this->user = $user;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = $this->user->get();
        if ($users->count() > 0) {
            foreach ($users as $user) {
                $this->wallet->create([
                    'user_id' => $user->id,
                    'type' => 'credit',
                    'amount' => 3000,
                    'balance' => 3000
                ]);     
            }
        }
    }
}
