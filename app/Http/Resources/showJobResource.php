<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Http\Resources\Json\JsonResource;

class showJobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $questions = Question::where('job_id', $this->id)
        ->get(['id', 'question_text', 'question_type'])
        ->map(function($question) {
            if ($question->question_type === 'multiple_choice') {
                $question->options = QuestionOption::where('question_id', $question->id)->pluck('option_text');
            }
            return $question;
        });
        $created_at = Carbon::parse($this->created_at)->format('d-M-y');
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

        $questionId = Question::where('job_id', $this->id)->pluck('id');
        $uniqueUserCount = answer::whereIn('question_id', $questionId)
        ->distinct('user_id')
        ->count('user_id');

        $experienceLabel = '';
            switch($this->experience_years){
              case '0-1':
                $experienceLabel = 'Freach';
                break;
              case '1-3':
                $experienceLabel = 'Junior';
                break;
              case '3-5':
                $experienceLabel = 'Mid-Level';
                break;
              case '5-10':
                $experienceLabel = 'Senior';
                break;
              case '+10':
              $experienceLabel = 'Team Lead';
            }
        return [
            'id' => $this->id,
            'img' => $this->hr->img  ?? null,
            'location' => $this->hr->company_location,
            'job_title' => $this->job_title,
            'employment_type' => $this->employment_type,
            'job_description' => $this->job_description,
            'company_about' => $this->company_about,
            'job_requirements' => $this->job_requirements,
            'experience_years' => $this->experience_years,
            'Career Level' => $experienceLabel,
            'salary' => $this->salary . ' ' . $this->salary_period,
            'section' => $this->section->name,
            'url' => $this->url ?? $questions,
            'displayTime' => $displayTime,
            'number applected' => $uniqueUserCount ?? 0,
            'published on' => $created_at,
        ];
    }
}
