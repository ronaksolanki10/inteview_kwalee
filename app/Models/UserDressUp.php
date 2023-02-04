<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDressUp extends Model
{
    protected $table = 'user_dress_ups';
    protected $guarded = [];
    protected $timestap = true;

    public function items()
    {
        return $this->hasMany(UserDressUpItem::class, 'user_dress_up_id');
    }
}
