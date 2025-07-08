<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
 public function comments()
{
    return $this->hasMany(Comment::class, 'blog_id'); // ✅ explicitly define correct column
}


}