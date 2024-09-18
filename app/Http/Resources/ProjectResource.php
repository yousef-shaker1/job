<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'project_name' => $this->project_name,
            'project_description' => $this->project_description,
            'skills_project' => $this->skills_project,
            'project_url' => $this->project_url,
            'project_name2' => $this->project_name2,
            'project_description2' => $this->project_description2,
            'skills_project2' => $this->skills_project2,
            'project_url2' => $this->project_url2,
            'project_name3' => $this->project_name3,
            'project_description3' => $this->project_description3,
            'skills_project3' => $this->skills_project3,
            'project_url3' => $this->project_url3,
        ];
    }
}
