<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->user->email,
            'img' => $this->UserPersonal->img,
            'name' => $this->UserPersonal->first_name . ' ' . $this->UserPersonal->middle_name . ' ' . $this->UserPersonal->last_name,
            'job_title' => $this->UserPersonal->job_title,
            'Year Experience' => $this->UserPersonal->year_experience,
            'phone' => $this->UserPersonal->phone,
            'birth_day' => $this->UserPersonal->birth_day,
            'gender' => $this->UserPersonal->gender,
            'UserSkill' => $this->UserSkill->skills,
            'linkedin' => $this->UserSkill->linkedin,
        ];
    }
}
