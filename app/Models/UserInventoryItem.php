<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInventoryItem extends Model
{
    protected $table = 'user_inventory_items';
    protected $guarded = [];
    protected $timestap = true;

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
