<?php

namespace App\Models;

use App\Models\Position;
use App\Models\HrAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jobs(){
        return $this->hasMany(Position::class);
    }
    public function hr(){
        return $this->hasOne(HrAccount::class);
    }
}
