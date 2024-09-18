<?php

namespace App\Models;

use App\Models\User;
use App\Models\UserSkill;
use App\Models\UserAddress;
use App\Models\UserProject;
use App\Models\UserPersonal;
use App\Models\UserWorkExperience;
use App\Models\UserWorkExperience2;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserEducationInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function userPersonal()
    {
        return $this->belongsTo(UserPersonal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function UserAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }


    public function UserEducationInformation()
    {
        return $this->belongsTo(UserEducationInformation::class);
    }

    public function UserSkill()
    {
        return $this->belongsTo(UserSkill::class);
    }

    
    public function UserWorkExperience()
    {
        return $this->belongsTo(UserWorkExperience::class);
    }
    
    public function UserWorkExperience2()
    {
        return $this->belongsTo(UserWorkExperience2::class);
    }
    
    public function UserProject()
    {
        return $this->belongsTo(UserProject::class);
    }

}
