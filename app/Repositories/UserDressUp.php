<?php

namespace App\Repositories;

use App\Interfaces\UserDressUp as UserDressUpInterface;
use App\Models\UserDressUp as UserDressUpModel;
use Illuminate\Database\QueryException;

class UserDressUp implements UserDressUpInterface
{
    private UserDressUpModel $model;

    public function __construct(UserDressUpModel $model)
    {
        $this->model =  $model;
    }
    public function findWhere(array $where): mixed
    {
        try {
            $query = $this->model->with(['items']);
            if (!empty($where)) {
                foreach($where as $conditon) {
                    $query = $query->where($conditon['column'], $conditon['operator'], $conditon['value']);
                }
            }

            return $query->first();
        } catch (QueryException $th) {
            throw $th;
        }
    }
    public function create(array $insertableData): void
    {
        $this->model->create($insertableData);
    }
    public function makeAllNonCurrent(int $userId): void
    {
        $this->model->where('user_id', $userId)->update(['is_current' => false]);
    }
}