<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\Position;
use App\Models\Question;
use App\Models\HrAccount;
use App\Models\UserProfile;
use App\Models\comment_blog;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_index');
    }

    public function section_index(){
        return view('admin.section');
    }

    public function jobs_index(){
        return view('admin.jobs');
    }
    public function user_index(){
        $users = UserProfile::with(['UserSkill','userPersonal'])->paginate(7);
        return view('admin.user_index', compact('users'));
    }
    public function hr_index(){
        $hrs = HrAccount::with('section')->paginate(7);
        return view('admin.hr_index', compact('hrs'));
    }
    public function blog_index(){
        return view('admin.blog_index');
    }

    public function Customer_Messages_index(){
        $Customer_Messages = contact::paginate(7);
        return view('admin.Customer_Messages', compact('Customer_Messages'));
    }

    public function show_question($id){
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
        return view('admin.show_question', compact('questionsWithOptions'));
    }

    public function delete(Request $request,$id){
        contact::find($request->id)->delete();
        session()->flash('delete', 'delete message success');
        return redirect()->back();
    }
    
    public function show_comment($id){
        $comments = comment_blog::with('user')->where('blog_id', $id)->paginate(6);
        if (!$comments) {
            // يمكنك هنا إضافة منطق عرض رسالة معينة في الواجهة إذا لم تكن هناك تعليقات
            return view('admin.show_comment', ['comments' => [], 'message' => 'لا توجد تعليقات حالياً.']);
        }
        return view('admin.show_comment',compact('comments'));
    }
    
        public function delete_comment(Request $request,$id){
            comment_blog::find($request->id)->delete();
            session()->flash('delete', 'delete comment success');
            return redirect()->back();
        }
}
