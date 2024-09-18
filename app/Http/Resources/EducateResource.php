<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducateResource extends JsonResource
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
            'college' => $this->college,
            'major' => $this->major,
            'start_date_month_university' => $this->start_date_month_university,
            'start_date_year_university' => $this->start_date_year_university,
            'end_date_month_university' => $this->end_date_month_university,
            'end_date_year_university' => $this->end_date_year_university,
            'university_year' => $this->university_year,
        ];
    }
}
