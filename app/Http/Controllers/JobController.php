<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\Position;
use App\Models\Question;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function job_details_page($id){
        $job = Position::findorfail($id);
        $check = false; // تعيين قيمة افتراضية
        if (!$job->url) {
            $question = Question::where('job_id', $id)->first();
            if ($question) {
                $check = Answer::where('question_id', $question->id)
                    ->where('user_id', Auth::user()->id)
                    ->exists();
                }
            }
        $check_user = Auth::check() ? UserProfile::where('user_id', Auth::user()->id)->exists() : false;
            $questionIds = Question::where('job_id', $job->id)->pluck('id');
            // حساب عدد الأشخاص الفريدين المسجلين
            $uniqueUserCount = Answer::whereIn('question_id', $questionIds)
            ->distinct('user_id')
            ->count('user_id');
            
        return view('user_page.job_details', compact('job', 'check', 'check_user', 'uniqueUserCount'));
    }
    
    public function form_job($id){
        $Questions = Question::where('job_id', $id)->get();
    
        $questionsWithOptions = [];
    
        foreach ($Questions as $Question) {
            $questionData = [
                'id' => $Question->id, // إضافة المعرف هنا
                'question_text' => $Question->question_text,
                'question_type' => $Question->question_type,
                'options' => []
            ];
    
            if ($Question->question_type == 'multiple_choice') {
                $QuestionOptions = QuestionOption::where('question_id', $Question->id)->get();
                $questionData['options'] = $QuestionOptions->pluck('option_text')->toArray();
            }
    
            $questionsWithOptions[] = $questionData;
        }
    
        return view('user_page.form_job', compact('questionsWithOptions'));
    }


    public function save_request_job(Request $request) {
        $data = $request->all();
        
        // عرض البيانات المرسلة للتحقق منها
        Log::info('Received data:', $data);
    
        // تخزين الإجابات
        foreach ($data as $key => $value) {
            // التحقق من نوع الإجابة بناءً على المفتاح
            if (strpos($key, 'question_text_') === 0) {
                // الحصول على ID السؤال من المفتاح
                $questionId = str_replace('question_text_', '', $key);
                $question = Question::find($questionId);
                
                if ($question) {
                    if ($question->question_type == 'text') {
                        // حفظ الإجابة النصية
                        Answer::create([
                            'user_id' => Auth::user()->id,
                            'question_id' => $question->id,
                            'text_answer' => $value,
                        ]);
                    }
                } else {
                    return 'not found';
                }
            } elseif (strpos($key, 'option_') === 0) {
                // الحصول على ID السؤال من المفتاح
                $questionId = str_replace('option_', '', $key);
                $question = Question::find($questionId);
                
                if ($question) {
                    if ($question->question_type == 'multiple_choice') {
                        // تحقق من أن هذه الإجابة تتوافق مع الخيارات
                        Answer::create([
                            'user_id' => Auth::user()->id,
                            'question_id' => $question->id,
                            'selected_option' => $value,
                        ]);
                    }
                } else {
                    Log::warning('Question not found for id:', [$questionId]);
                }
            }
        }
        session()->flash('message', 'تم ارسال الطلب بنجاح');
        return redirect()->route('job_details_page', $question->job_id);
    }
}
