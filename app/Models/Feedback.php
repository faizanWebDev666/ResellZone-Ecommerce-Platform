<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Specify the fillable fields for mass assignment
    protected $fillable = ['title', 'name', 'email', 'review', 'image'];

    // If you need timestamps (created_at, updated_at)
    public $timestamps = true;
}
