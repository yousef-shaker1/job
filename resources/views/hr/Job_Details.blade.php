@extends('layouts.master')

@section('title')
job_details
@endsection

@section('css')
<style>
    .thumb img {
        max-width: 78px;
        margin-bottom: -51px;
        margin-top: -28px;
        margin-left: -14px;
        height: auto;
    }
</style>
@endsection


@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>{{ $job->job_title }}</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ bradcam_area  -->

  <div class="job_details_area">
    @if (session()->has('message'))
    <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
    @if (session()->has('expired'))
    <div class="alert alert-danger">
          {{ session('expired') }}
      </div>
  @endif
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="job_details_header">
                      <div class="single_jobs white-bg d-flex justify-content-between">
                          <div class="jobs_left d-flex align-items-center">
                              <div class="thumb">
                                @if($job->hr->img)
                                <img src="{{ Storage::url($job->hr->img) }}" alt="Company Logo">
                                @else
                                <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="Company Logo">
                                @endif
                              </div>
                              <div class="jobs_conetent">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <a href="#"><h4 style="margin: 0;">{{ $job->job_title }}</h4></a>
                                    <div class='jobs_right'>
                                        <div class="apply_now">
                                        </div>
                                    </div>
                                </div>
                                  <div class="links_locat d-flex align-items-center">
                                      <div class="location">
                                          <p> <i class="fa fa-map-marker"></i>{{ $job->hr->company_location }}</p>
                                      </div>
                                      <div class="location">
                                          <p> <i class="fa fa-clock-o"></i>{{ $job->employment_type }}</p>
                                      </div>
                                  </div>
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
                                    <br>
                                  <p class="date">Posted {{ $displayTime }}</p>
                                  <p class="date">Number of applicants {{ $uniqueUserCount }} person</p>
                                  @if(!empty($job->url))
                                    <p class="date">{{ $job->url }}</p>
                                  @endif
                              </div>
                          </div>
                          <div class="jobs_right d-flex align-items-center gap-3">
                            @if(empty($job->url))
                                <a href="{{ route('show_request', $job->id) }}" class="boxed-btn3">show request</a>
                            @else
                                <a href="{{ $job->url }}" class="btn btn-primary" target='_blank'>Apply on Company's Website</a>
                            @endif
                        </div>
                        
                      </div>
                  </div>
                  <div class="descript_wrap white-bg">
                      <div class="single_wrap">
                          <h4>Company Information</h4>
                          <p>{{ $job->company_about }}.</p>
                      </div>

                      <div class="single_wrap">
                          <h4>Job description</h4>
                          <p>{{ $job->job_description }}.</p>
                      </div>

                      <div class="single_wrap">
                          <h4>Requirements</h4>
                          <p>{{ $job->job_requirements }}.</p>
                      </div>

                      <div class="single_wrap">
                          <h4>Section</h4>
                            <p>
                                {{ $job->section->name }}
                            </p>
                      </div>
                  </div>
                 
              </div>
              <div class="col-lg-4">
                  <div class="job_sumary">
                      <div class="summery_header">
                          <h3>Additional information</h3>
                          @if($job->is_expired == 0)
                          <a class="btn btn-danger" href="{{ route('Stop_show_job', $job->id) }}">Stop displaying the advertisement</a>
                      @else 
                          <a class="btn btn-success" href="{{ route('show_it', $job->id) }}">Show it</a>
                      @endif
                      
                      </div>
                      <div class="job_content">
                          <ul>
                              <li>Published on: <span>{{  Carbon\Carbon::parse($job->created_at)->format('d-M-Y') }}</span></li>
                              <li>Experience Needed: <span>{{ $job->experience_years }} years</span></li>
                                @php
                                $experienceLabel = '';
                                switch($job->experience_years){
                                  case '0-1':
                                    $experienceLabel = 'Freach';
                                    break;
                                  case '1-3':
                                    $experienceLabel = 'Junior';
                                    break;
                                  case '3-5':
                                    $experienceLabel = 'Mid-Level';
                                    break;
                                  case '5-10':
                                    $experienceLabel = 'Senior';
                                    break;
                                  case '+10':
                                  $experienceLabel = 'Team Lead';
                                }
                                @endphp
                              <li>Career Level: <span>{{ $experienceLabel }}</span></li>
                              <li>
                                  Salary:
                                  @if($job->salary)
                                  <span>{{ $job->salary }} for {{ $job->salary_period }}</span>
                                  @endif
                                </li>
                                <li>Job Location: <span>{{ $job->hr->company_location }}</span></li>
                              <li>Job Nature: <span>{{ $job->employment_type }}</span></li>
                          </ul>
                      </div>
                  </div>
          </div>
      </div>
  </div>
@endsection

@section('js')

@endsection