<?php

namespace App\Repositories;

use App\Interfaces\UserInventoryItem as UserInventoryItemInterface;
use App\Models\UserInventoryItem as UserInventoryItemModel;
use Illuminate\Database\QueryException;

class UserInventoryItem implements UserInventoryItemInterface
{
    private UserInventoryItemModel $model;

    public function __construct(UserInventoryItemModel $model)
    {
        $this->model =  $model;
    }
    public function findWhere(array $where): mixed
    {
        try {
            $query = $this->model->with(['item']);
            if (!empty($where)) {
                foreach($where as $conditon) {
                    $query = $query->where($conditon['column'], $conditon['operator'], $conditon['value']);
                }
            }
            
            return $query->get();
        } catch (QueryException $th) {
            throw $th;
        }
    }
    public function create(array $insertableData): void
    {
        $this->model->create($insertableData);
    }
}