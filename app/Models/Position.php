<?php

namespace App\Models;

use App\Models\Section;
use App\Models\love_job;
use App\Models\Question;
use App\Models\HrAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'positions';
    
    public function hr()
    {
        return $this->belongsTo(HrAccount::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'job_id');
    }
}
