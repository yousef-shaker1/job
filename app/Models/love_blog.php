<?php

namespace App\Models;

use App\Models\blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class love_blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function blog()
    {
        return $this->belongsToMany(blog::class, 'love_blogs');
    }
}
