<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\Section;
use App\Models\Position;
use App\Models\Question;
use App\Models\HrAccount;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;

class HrController extends Controller
{
    public function login_hr(){
        return view('user_page.login_hr');
    }
    public function hr_index_page(){
        return view('hr.index_page');
    }

    public function view_profile(){
        $hr = HrAccount::findorfail(Auth::user()->hrAccount->id);
        return view('hr.view_profile', compact('hr'));
    }

    public function Job_management_page(){
        $hr_id = HrAccount::where('user_id', Auth::user()->id)->pluck('id');
        $jobs = Position::where('hr_id', $hr_id)->get();
        $jobIds = $jobs->pluck('id');
        $jobUserCounts = [];

        foreach ($jobs as $job) {
            $questionIds = Question::where('job_id', $job->id)->pluck('id');
            $uniqueUserCount = answer::whereIn('question_id', $questionIds)
            ->distinct('user_id')
            ->count('user_id');
    
            // تخزين النتيجة في المصفوفة
            $jobUserCounts[$job->id] = $uniqueUserCount;
        }
        return view('hr.Job_management_page', compact('jobs', 'jobUserCounts'));
    }
    public function Job_Details($id){
        $job = Position::findorfail($id);
        $questionId = Question::where('job_id', $job->id)->pluck('id');
        $uniqueUserCount = answer::whereIn('question_id', $questionId)->distinct('user_id')->count('user_id');
        return view('hr.Job_Details', compact('job', 'uniqueUserCount'));
    }

    public function show_request($id)
    {
        $job = Position::with(['questions.answers.user'])->find($id);
    
        if (!$job) {
            return "Job not found.";
        }
    
        return view('hr.show_request', compact('job'));
    }
    

    public function Stop_show_job($id){
        Position::findorfail($id)->update([
            'is_expired' => 1,
        ]);
        session()->flash('expired', 'job is expired');
        return redirect()->back();
    }

    public function show_it($id){
        Position::findorfail($id)->update([
            'is_expired' => 0,
        ]);
        session()->flash('message', 'The job has been successfully posted.');
        return redirect()->back();
    }

}
