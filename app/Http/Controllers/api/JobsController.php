<?php

namespace App\Http\Controllers\api;

use App\ApirequestTrait;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobsResource;
use App\Http\Resources\job_hrResource;
use App\Http\Resources\showJobResource;
use App\Http\Resources\internshipResource;
use App\Http\Resources\JobShow_allResource;

class JobsController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $jobs = JobsResource::collection(Position::all());
        return $this->apiResponse($jobs, 'ok', 200);
    }
    
    public function expired(Request $request,$id){
        $job = Position::find($id);
        if(!$job){
            return $this->apiResponse(null, 'job not fount', 404);
        }
        
        $job->update([
            'is_expired' => 1,
        ]);
        return $this->apiResponse(new JobsResource($job), 'job is expired', 200);
    }
    
    public function repost(Request $request,$id){
        $job = Position::find($id);
        if(!$job){
            return $this->apiResponse(null, 'job not fount', 404);
        }
        
        $job->update([
            'is_expired' => 0,
        ]);
        return $this->apiResponse(new JobsResource($job), 'job is repost', 200);
    }
    
    public function delete(Request $request,$id){
        $job = Position::find($id);
        if(!$job){
            return $this->apiResponse(null, 'job not fount', 404);
        }
        
        $job->delete();
        return $this->apiResponse(null, 'delete success', 200);
    }

    public function show_all(){
        $jobs = JobShow_allResource::collection(Position::all());
        return $this->apiResponse($jobs, 'ok', 200);
    }

    public function show(Request $request,$id){
        $job = Position::find($id);
        if(!$job){
            return $this->apiResponse(null, 'job not fount', 404);
        }
        return $this->apiResponse(new showJobResource($job), 'ok', 200);
    }
    
    public function search_job($name, $location, $id){
        $jobs = Position::where('job_title', $name)->whereHas('hr', function ($query) use ($location) {
            $query->where('company_location', $location);
        })->where('section_id', $id)->get();
        if(!$jobs){
            return $this->apiResponse(null, 'job not fount', 404);
        }   
        $job = JobShow_allResource::collection($jobs);
        return $this->apiResponse($job, 'ok', 200);  
    }
    
    public function search_job_section($id){
        $jobs = Position::where('section_id', $id)->get();
        if(!$jobs){
            return $this->apiResponse(null, 'job not fount', 404);
        }   
        $job = JobShow_allResource::collection($jobs);
        return $this->apiResponse($job, 'ok', 200);
    }

    public function jobs_hr($id){
        $jobs = Position::where('hr_id', $id)->get();
        if(!$jobs){
            return $this->apiResponse(null, 'job not fount', 404);
        }
        $job = job_hrResource::collection($jobs);
        return $this->apiResponse($job, 'ok', 200);
    }

    public function jobs_intern(){
        $jobs = Position::where('employment_type', 'training')->get();
        if(!$jobs){
            return $this->apiResponse(null, 'job not fount', 404);
        }
        $job = internshipResource::collection($jobs);
        return $this->apiResponse($job, 'ok', 200);
    }


}
