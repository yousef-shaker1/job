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

    public function filterJobs(Request $request){
        $query = Position::query()
            ->join('hr_accounts', 'positions.hr_id', '=', 'hr_accounts.id')
            ->select('positions.*', 'hr_accounts.company_location')
            ->where('positions.is_expired', 0);

        if ($request->has('section_id')) {
            $query->where('positions.section_id', $request->section_id);
        }

        // // تصفية بناءً على الموقع
        if ($request->has('company_location')) {
            $query->where('hr_accounts.company_location', 'LIKE', '%' . $request->company_location . '%');
        }

        if ($request->has('salaryFrom') && $request->has('salaryTo')) {
            $query->whereRaw('CAST(SUBSTRING(positions.salary, 1, LENGTH(salary) - 3) AS UNSIGNED) BETWEEN ? AND ?', [$request->salaryFrom, $request->salaryTo]);
        }
    
        if ($request->has('job_types')) {
            $query->where('positions.employment_type', $request->job_types);
        }

        if ($request->has('experience_years')) {
            $query->where('positions.experience_years', $request->experience_years);
        }
    
        // $jobs = $query->get();
        $jobs = JobShow_allResource::collection($query->get());
        return $this->apiResponse($jobs, 'ok', 200);
        
    }


}
