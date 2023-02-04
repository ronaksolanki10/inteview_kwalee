<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $guarded = [];
    protected $timestap = true;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
