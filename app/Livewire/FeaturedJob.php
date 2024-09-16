<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\love_job;
use App\Models\Position;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class FeaturedJob extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $test = love_job::where('user_id', Auth::user()->id)->get();
        $jobIds = $test->pluck('job_id')->toArray();
        $jobs = Position::whereIn('id', $jobIds)->paginate(8);
        return view('livewire.featured-job',compact('jobs'));
    }

    public function delLove($jobId){
        if(Auth::user() && $jobId){
            love_job::where('user_id', Auth::user()->id)->where('job_id', $jobId)->delete();
        }
    }

}
