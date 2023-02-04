<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens;
    
    protected $table = 'users';
    protected $guarded = [];
    protected $timestap = true;
}
