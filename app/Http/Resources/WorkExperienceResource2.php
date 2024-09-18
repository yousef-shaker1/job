<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkExperienceResource2 extends JsonResource
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
            'company_name2' => $this->company_name2,
            'job_title2' => $this->job_title2,
            'job_description2' => $this->job_description2,
            'start_date_month2' => $this->start_date_month2,
            'start_date_year2' => $this->start_date_year2,
            'end_date_month2' => $this->end_date_month2,
            'end_date_year2' => $this->end_date_year2,
            'company_name3' => $this->company_name3,
            'job_title3' => $this->job_title3,
            'job_description3' => $this->job_description3,
            'start_date_month3' => $this->start_date_month3,
            'start_date_year3' => $this->start_date_year3,
            'end_date_month3' => $this->end_date_month3,
            'end_date_year3' => $this->end_date_year3,
        ];
    }
}
