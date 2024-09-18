<?php

namespace App\Models;

use App\Models\blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment_blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(blog::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
