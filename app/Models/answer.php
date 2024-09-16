<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class answer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
