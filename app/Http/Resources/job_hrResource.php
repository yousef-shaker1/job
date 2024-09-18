<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class job_hrResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
{
    // حساب الفارق بين الوقت الحالي وتاريخ الإنشاء
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

    // جلب الأسئلة المتعلقة بالوظيفة
    $questions = Question::where('job_id', $this->id)->get();

    // جلب الأجوبة المتعلقة بكل سؤال
    $answersData = $questions->map(function ($question) {
        return [
            'question' => $question->question_text,
            'answers' => answer::where('question_id', $question->id)
                ->with('user')
                ->get()
                ->map(function ($answer) {
                    return [
                        'user_name' => $answer->user ? $answer->user->name : 'Unknown',
                        'answer' => $answer->text_answer ?? $answer->selected_option,
                    ];
                }),
        ];
    });

    $questionIds = $questions->pluck('id');
    $uniqueUserCount = answer::whereIn('question_id', $questionIds)
        ->distinct('user_id')
        ->count('user_id');

    return [
        'id' => $this->id,
        'img' => $this->hr->img,
        'job_title' => $this->job_title,
        'section' => $this->section->name,
        'number_applicants' => $uniqueUserCount ?? 0,
        'display_time' => $displayTime,
        'url' => $this->url ?? $answersData,
    ];
}

}
