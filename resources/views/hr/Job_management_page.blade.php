@extends('layouts.master')

@section('title')
Internships
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
  body {
      background-color: #f8f9fa;
  }
  .job-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 16px;
      margin-bottom: 16px;
      background-color: #fff;
      transition: box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
  }
  .job-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }
  .filter-bar {
      background-color: #fff;
      padding: 16px;
      border-radius: 8px;
      margin-bottom: 16px;
      border: 1px solid #ddd;
  }
  .pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
  }
  .section-buttons {
      margin-bottom: 20px;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
  }
  .thumb img{
    width: 70px;
    margin-left: 230px;
    margin-bottom: -20px;
}
/* .inter{
  } */
</style>
@endsection


@section('content')
<div class="bradcam_area bradcam_bg_1">
  <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="bradcam_text">
                  <h3>Your Jobs</h3>
              </div>
          </div>
      </div>
  </div>
</div>

<div>
  <div class="container my-4">
    <div class="row">
      @forelse($jobs as $job)
      
  <div class="col-md-4 mb-4">
  <div class="job-card white-bg p-3 border rounded" style="width: 100%; max-width: 350px; height: 260px;">
          <div class="d-flex align-items-start mb-2">
              <div>
                  <h5 class="mb-2">{{ $job->job_title }}</h5>
                 
                  <div class="thumb">
                      @if($job->hr->img)
                      <img src="{{ Storage::url($job->hr->img) }}" alt="" class="job-thumbnail">
                      @else
                      <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="" class="job-thumbnail">
                      @endif
                  </div>
                  <!-- Company Location -->
                  <p class="text-muted mb-1">{{ $job->section->name }}</p>
                  <p class="text-muted mb-1">{{ $jobUserCounts[$job->id] ?? 0 }}</p>
                  <!-- Posted Time -->
                  <?php
                      $createdAt = Carbon\Carbon::parse($job->created_at);
                      $now = Carbon\Carbon::now();
                      $diffInDays = $createdAt->diffInDays($now);
                      $diffInHours = $createdAt->diffInHours($now);
                      if ($diffInHours >= 24) {
                          $diffInDays = floor($diffInHours / 24); 
                          $displayTime = $diffInDays . ' days ago';
                      } else {
                          $displayTime = floor($diffInHours) . ' hours ago';
                      }
                  ?>
                      <p class="date mb-2">Posted {{ $displayTime }}</p>
                      @if($job->is_expired == 1) 
                      <p style="color: #d9534f; font-size: 0.875rem; margin-top: 5px; font-weight: bold;">
                          This job has been blocked from being displayed.
                      </p>
                  @endif
                  
              </div>
          </div>
          
          <!-- View Details Button -->
          <a href="{{ route('Job_Details', $job->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
      </div>
  </div>
  @empty
  <div class="col-12">
      <p>No training available.</p>
  </div>
  @endforelse
</div>
    </div>
</div>

@endsection

@section('js')

@endsection