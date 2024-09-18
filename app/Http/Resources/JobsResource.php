<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Http\Resources\Json\JsonResource;

class JobsResource extends JsonResource
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
        return [
            'id' => $this->id,
            'img' => $this->hr->img,
            'job_title' => $this->job_title,
            'job_description' => $this->job_description,
            'job_requirements' => $this->job_requirements,
            'experience_years' => $this->experience_years,
            'salary' => $this->salary . ' ' . $this->salary_period,
            'employment_type' => $this->employment_type,
            'section' => $this->section->name,
            'url' => $this->url ?? $questions,
        
            'displayTime' => $displayTime,
            'number applected' => $uniqueUserCount ?? 0,
           'is_expired' => $this->is_expired,
        ];
    }
}
