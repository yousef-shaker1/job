<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobShow_allResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $createdAt = Carbon::parse($this->created_at);
        $now = Carbon::now();
        $diffInDays = $createdAt->diffInDays($now);
        $diffInHours = $createdAt->diffInHours($now);
        if ($diffInHours >= 24) {
            $diffInDays = floor($diffInHours / 24); 
            $displayTime = $diffInDays . ' days ago';
        } else {
            $displayTime = floor($diffInHours) . ' hours ago';
        }
        return [
            'id' => $this->id,
            'img' => $this->hr->img,
            'job_title' => $this->job_title,
            'location' => $this->hr->company_location,
            'employment_type' => $this->employment_type,
            'salary' => $this->salary . ' ' . $this->salary_period,
            'experience_years' => $this->experience_years,            
            'displayTime' => $displayTime,
        ];
    }
}
