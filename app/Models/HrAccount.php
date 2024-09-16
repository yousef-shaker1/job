<?php

namespace App\Models;

use App\Models\User;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HrAccount extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'hr_accounts';

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
