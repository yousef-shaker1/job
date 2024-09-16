<?php

namespace App\Models;

use App\Models\User;
use App\Models\comment_blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comment_blog()
    {
        return $this->hasMany(comment_blog::class);
    }
    public function user()
    {
        return $this->belongsto(User::class);
    }
}
