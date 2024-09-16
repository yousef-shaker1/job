<div>
    <div class="job_details_area">
      <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                    <div class="job_lists m-0">
                        <div class="row">
                            @forelse ($jobs as $job)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="thumb">
                                                @if($job->hr->img)
                                                <img src="{{ Storage::url($job->hr->img) }}" alt="" class="job-thumbnail">
                                                @else
                                                <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="" class="job-thumbnail">
                                                @endif
                                            </div>
                                            <div class="jobs_conetent">
                                                <a href="{{ route('job_details_page', $job->id) }}" target="_blank"><h4>{{ $job->job_title }}</h4></a>
                                                <div class="links_locat d-flex align-items-center">
                                                    <div class="location">
                                                        <p><i class="fa fa-map-marker"></i>{{ $job->hr->company_location }}</p>
                                                    </div>
                                                    <div class="location">
                                                        <p><i class="fa fa-clock-o"></i>{{ $job->employment_type }}</p>
                                                    </div>
                                                    <div class="salary">
                                                        <p><i class="fa fa-dollar-sign"></i>{{ $job->salary }} {{ $job->salary_period }}</p>
                                                    </div>
                                                </div>
                                                
                                            <div class="date">
                                                <p>{{ $job->experience_years }} years</p>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="jobs_right">
                                            <div class="apply_now">
                                                <livewire:LoveJob :jobId="$job->id">
                                                <a href="{{ route('job_details_page', $job->id) }}" target="_blank" class="boxed-btn3">Apply Now</a>
                                            </div>
                                            <div class="date">
                                                <p>Date line: {{ \Carbon\Carbon::parse($job->posted_at)->format('d-M-Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle"></i> <strong>No jobs found matching your search criteria.</strong>
                                    <p>Try adjusting your search options or expanding the search range to get more results.</p>
                                </div>
                            @endforelse

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pagination_wrap">
                                        {{ $jobs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
