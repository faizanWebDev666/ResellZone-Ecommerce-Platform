<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //its correct not change it

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }
    
    //its correct not change it
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId'); 
    }
    

}
