<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionOption extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'question_options';

    public function Question(){
        return $this->hasOne(Question::class);
    }
}
