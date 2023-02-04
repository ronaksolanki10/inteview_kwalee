<?php

namespace App\Repositories;

use App\Interfaces\UserDressUpItem as UserDressUpItemInterface;
use App\Models\UserDressUpItem as UserDressUpItemModel;

class UserDressUpItem implements UserDressUpItemInterface
{
    private UserDressUpItemModel $model;

    public function __construct(UserDressUpItemModel $model)
    {
        $this->model =  $model;
    }
    public function create(array $insertableData): void
    {
        $this->model->create($insertableData);
    }
}