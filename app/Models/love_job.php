<?php

namespace App\Models;

use App\Models\User;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class love_job extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    

    public function job()
    {
        return $this->belongsToMany(Position::class, 'love_jobs');
    }
}
