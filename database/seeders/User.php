<?php

namespace Database\Seeders;

use App\Interfaces\User as UserInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Miles',
                'email' => 'john.miles@kwalee.com',
                'password' => Hash::make('John@123')
            ],
            [
                'name' => 'Stefen Robot',
                'email' => 'stefen.robot@kwalee.com',
                'password' => Hash::make('Stefen@123')
            ],
            [
                'name' => 'Mike Thomson',
                'email' => 'mike.thomson@kwalee.com',
                'password' => Hash::make('Mike@123')
            ],
        ];
        foreach($users as $user) {
            $this->user->create($user);
        }
    }
}
