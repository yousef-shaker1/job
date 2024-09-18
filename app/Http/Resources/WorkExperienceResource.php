<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkExperienceResource extends JsonResource
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
            'company_name1' => $this->company_name1,
            'job_title1' => $this->job_title1,
            'job_description1' => $this->job_description1,
            'start_date_month1' => $this->start_date_month1,
            'start_date_year1' => $this->start_date_year1,
            'end_date_month1' => $this->end_date_month1,
            'end_date_year1' => $this->end_date_year1,
            'currently_working' => $this->currently_working,
        ];
    }
}
