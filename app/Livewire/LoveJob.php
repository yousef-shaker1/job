<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\love_job;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class LoveJob extends Component
{
    public $jobId;

    public function mount($jobId)
    {
        $this->jobId = $jobId;
    }

    public function addLove($jobId){
        if(Auth::user() && $jobId){
            love_job::create([
                'user_id' => Auth::user()->id,
                'job_id' => $jobId,
            ]);
        }
    }
    public function delLove($jobId){
        if(Auth::user() && $jobId){
            love_job::where('user_id', Auth::user()->id)->where('job_id', $jobId)->delete();
        }
    }

    public function render()
    {
        $jobs = Position::find($this->jobId);
        $love_jobs = love_job::where('user_id', Auth::user()->id)
        ->whereIn('job_id', $jobs->pluck('id')->toArray())
        ->pluck('job_id')
        ->toArray();
        return view('livewire.love-job', [
            'job' => $jobs,
            'love_jobs' => $love_jobs,
        ]);
    }
}
