<?php

namespace App\Repositories;

use App\Interfaces\Category as CategoryInterface;
use App\Models\Category as CategoryModel;

class Category implements CategoryInterface
{
    private CategoryModel $model;

    public function __construct(CategoryModel $model)
    {
        $this->model =  $model;
    }
    public function create(array $insertableData): void
    {
        $this->model->create($insertableData);
    }
    public function get(): mixed
    {
        return $this->model->orderBy('position', "ASC")->get();
    }
}