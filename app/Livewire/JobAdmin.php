<?php

namespace App\Livewire;

use App\Models\answer;
use Livewire\Component;
use App\Models\Position;
use App\Models\Question;
use Livewire\WithPagination;

class JobAdmin extends Component
{
    use WithPagination;
    public $id;
    public function render()
    {
        $jobs = Position::with('section')->paginate(7);
        $jobUserCounts = [];
        foreach ($jobs as $job) {
            $questionId = Question::where('job_id', $job->id)->pluck('id');
            $uniqueUserCount = answer::whereIn('question_id', $questionId)
            ->distinct('user_id')
            ->count('user_id');
                $jobUserCounts[$job->id] = $uniqueUserCount;
        }
        return view('livewire.job-admin', compact('jobs', 'jobUserCounts'));
    }

    public function editexpired($id){
        $job = Position::find($id);
        if($job){
        $job->update([
            'is_expired' => 1,
        ]);
        } else {
            return redirect()->back();
        }
        session()->flash('message', 'job is expired');
    }

    public function Repost($id){
        $job = Position::find($id);
        if($job){
            $job->update([
                'is_expired' => 0,
            ]);
        } else {
            return redirect()->back();
        }
        session()->flash('message', 'job is Repost');
    }

    public function deletejob($id){
        $job = Position::find($id);
        if($job){
            $job->delete();
        } else {
            return redirect()->back();
        }
        session()->flash('delete', 'job delete success');
    }
}
