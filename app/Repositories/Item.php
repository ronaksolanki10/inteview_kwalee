<?php

namespace App\Repositories;

use App\Interfaces\Item as ItemInterface;
use App\Models\Item as ItemModel;
use App\Models\Category as CategoryModel;

class Item implements ItemInterface
{
    private ItemModel $model;
    private CategoryModel $categoryModel; 

    public function __construct(ItemModel $model, CategoryModel $categoryModel)
    {
        $this->model =  $model;
        $this->categoryModel =  $categoryModel;
    }
    public function create(array $insertableData): void
    {
        $this->model->create($insertableData);
    }
    public function get(): mixed
    {
        return $this->categoryModel
                    ->select('id', 'name', 'image')
                    ->with(['items' => function ($query) {
                        $query->select('id', 'name', 'image', 'price', 'category_id');
                    }])
                    ->groupBy('id')
                    ->orderBy('position', 'ASC')
                    ->get();
    }
    public function find(int $id): mixed
    {
        return $this->model->where('id', $id)->first();
    }
    public function findIn(string $column, array $whereIn): mixed
    {
        return $this->model->whereIn($column, $whereIn)->orderBy('category_id', 'ASC')->get();
    }
}