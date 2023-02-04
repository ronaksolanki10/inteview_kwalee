<?php

namespace App\Repositories;

use App\Interfaces\User as UserInterface;
use App\Models\User as UserModel;

class User implements UserInterface
{
    private UserModel $model;

    public function __construct(UserModel $model)
    {
        $this->model =  $model;
    }
    public function findByEmail(string $email): mixed
    {
        return $this->model->where('email', $email)->first();
    }
    public function get(): mixed
    {
        return $this->model->get();
    }
    public function create(array $insertableData): void
    {
        $this->model->create($insertableData);
    }
}