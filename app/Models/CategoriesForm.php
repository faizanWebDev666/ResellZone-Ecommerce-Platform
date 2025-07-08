<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesForm extends Model
{
    protected $fillable = [
        'user_id',
        'pictures',
        'title',
        'description',
        'name',
        'category',
        'city',
        'phone_number',
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
        'wifi',
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
        'type',
        'category',
        'vehicle_type',
        'condition',
        'transmission',
    ];
}
