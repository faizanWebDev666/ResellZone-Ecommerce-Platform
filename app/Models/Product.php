<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Add 'price' to the $fillable array to allow mass assignment
    protected $fillable = [
        'title', 
        'description', 
        'name', 
        'category', 
        'price', 
        'location', 
        'city', 
        'phone_number', 
        'wifi_availability', 
        'condition', 
        'body_type', 
        'transmission', 
        'fuel_type', 
        'color_options', 
        'seats', 
        'features', 
        'register_city', 
        'car_documents', 
        'assembly_type', 
        'km_driven', 
        'make', 
        'model', 
        'brand', 
        'screen_size', 
        'resolution', 
        'power_source', 
        'capacity', 
        'load_type', 
        'fuel', 
        'voltage', 
        'wattage', 
        'numTaps', 
        'refrigerator', 
        'musical_instruments', 
        'gym_and_fitness', 
        'kids_bath_diaper', 
        'kid_accessories', 
        'kids_toys', 
        'camera_installation', 
        'table_dinning', 
        'item', 
        'householdSubtypeSelection', 
        'officefurnituresubtypeSelection', 
        'views',
        'type',
         'processor',
    'ram',
    'storage',
    ];
   

    // Define the relationship with product images
   
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function orderItems()
{
    return $this->hasMany(OrderItem::class, 'productId');
}

    // Define the relationship for bookmarks
    public function bookmarkedBy()
    {
        return $this->belongsToMany(User::class, 'bookmarks')->withTimestamps();
    }
    public function questions()
    {
        return $this->hasMany(Questions::class); // Assumes each product can have many questions
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
public function productImages()
{
    return $this->hasMany(ProductImages::class, 'product_id');
}

public function sellerRegistration()
{
    return $this->hasOne(SellersRegistration::class, 'user_id', 'user_id');
}

public function seller()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
