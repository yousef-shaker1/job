<?php

namespace App\Models;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'question_text',
        'question_type'
    ];
    protected $table = 'questions';
    public function Position(){
        return $this->belongsTo(Position::class, 'job_id');
    }

    public function answers()
{
    return $this->hasMany(answer::class);
}
}
