<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
      protected $fillable = [
        'blog_id',
        'user_id', 
        'comment',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function blog()
{
    return $this->belongsTo(blogs::class);
}

}
