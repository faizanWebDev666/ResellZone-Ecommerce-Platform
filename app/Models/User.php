<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword; // Import the interface
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable
use Illuminate\Notifications\Notifiable; // Import Notifiable trait
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import HasFactory

class User extends Authenticatable implements CanResetPassword // Implement the interface
{
    use HasFactory, Notifiable; // Use the traits

    // Define your model properties, such as fillable fields, here
   protected $fillable = [
    'name',
    'email',
    'password',
    'type',
    'google_id',
    'google_token',
    'google_refresh_token',
    'facebook_id',
    'admin_profile',     // ✅ Profile image
    'cover_pic',         // ✅ Cover image
];


    // If you need to hash the password when saving the model
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bookmarks()
    {
        return $this->belongsToMany(Product::class, 'bookmarks')->withTimestamps();
    }

    public function ratings()
{
    return $this->hasMany(Rating::class);
}
public function comments()
{
    return $this->hasMany(Comment::class);
}

public function questions()
{
    return $this->hasMany(Questions::class);
}


public function products()
{
    return $this->hasMany(Product::class);
}
public function wishlist()
{
    return $this->hasMany(Wishlist::class);
}


}
