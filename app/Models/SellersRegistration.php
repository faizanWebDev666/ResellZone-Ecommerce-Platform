<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellersRegistration extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'store_name',
        'email',
        'contact',
        'address',
        'status',
    ];
    
}
