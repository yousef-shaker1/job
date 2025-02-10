<div>
    <!-- bradcam_area -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{ $jobs->count() }}+ Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    <!-- job_listing_area_start -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <!-- Filter Sidebar -->
                <div class="col-lg-3">
                    <div class="job-filter">
                        <div class="small-section-tittle2 mb-45 d-flex align-items-center">
                            <div class="icon d-flex align-items-center mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="12px">
                                    <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                </svg>
                            </div>
                            <h4 class="font-weight-bold mb-0">Filter Jobs</h4>
                        </div>

                        <!-- Filter Form -->
                        <form wire:submit.prevent="save">
                            <div class="job-category-listing mb-50 p-3 rounded shadow-sm bg-white">
                                <!-- Job Category -->
                                <div class="single-listing mb-4">
                                    <h5 class="text-muted mb-2"><i class="fas fa-briefcase mr-2"></i> Job Category</h5>
                                    <select class="form-control w-100" wire:model.defer="section_id">
                                        <option value="">All Categories</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                <!-- Job Type -->
                                <div class="single-listing mb-4">
                                    <h5 class="text-muted mb-3"><i class="fas fa-clock mr-2"></i> Job Type</h5>
                                    @foreach (['full_time', 'part_time', 'remote', 'contract', 'temporary', 'training', 'Fresh-graduate'] as $type)
                                        <label class="d-block">
                                            <input type="checkbox" class="mr-2" wire:model.defer="job_types"
                                                value="{{ $type }}"> {{ ucfirst(str_replace('_', ' ', $type)) }}
                                        </label>
                                    @endforeach
                                </div>

                                <!-- Job Location -->
                                <div class="single-listing mb-4">
                                    <h5 class="text-muted mb-2"><i class="fas fa-map-marker-alt mr-2"></i> Job Location</h5>
                                    <select class="form-control w-100" wire:model.defer="company_location">
                                        <option value="" selected>Anywhere</option>
                                        @foreach ([
                                            'usa' => 'United States',
                                            'canada' => 'Canada',
                                            'egypt' => 'Egypt',
                                            'germany' => 'Germany',
                                            'france' => 'France',
                                            'japan' => 'Japan',
                                            'australia' => 'Australia',
                                            'switzerland' => 'Switzerland',
                                            'singapore' => 'Singapore',
                                            'netherlands' => 'Netherlands',
                                            'sweden' => 'Sweden',
                                            'norway' => 'Norway',
                                            'finland' => 'Finland',
                                            'denmark' => 'Denmark',
                                            'south_korea' => 'South Korea',
                                            'hong_kong' => 'Hong Kong',
                                            'new_zealand' => 'New Zealand',
                                            'austria' => 'Austria',
                                            'ireland' => 'Ireland',
                                            'luxembourg' => 'Luxembourg',
                                        ] as $key => $location)
                                            <option value="{{ $key }}">{{ $location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                


                                <!-- Experience -->
                                <div class="single-listing mb-4">
                                    <h5 class="text-muted mb-3"><i class="fas fa-briefcase mr-2"></i> Experience</h5>
                                    @foreach (['0-1', '1-3', '3-5', '5-10', '10+'] as $years)
                                        <label class="d-block">
                                            <input type="checkbox" class="mr-2" wire:model.defer="experience_years"
                                                value="{{ $years }}"> {{ $years }} years
                                        </label>
                                    @endforeach
                                </div>

                                <!-- Salary Range Section -->
                                <div class="single-listing">
                                    <h5 class="text-muted mb-3"><i class="fas fa-dollar-sign mr-2"></i>Salary Range</h5>
                                    <div class="d-flex align-items-center mt-3">
                                        <span class="mr-2">From:</span>
                                        <input type="number" wire:model.debounce.500ms="salaryFrom" id="salary-from"
                                            class="form-control custom-width mr-2" />
                                        <span class="mr-2">To:</span>
                                        <input type="number" wire:model.debounce.500ms="salaryTo" id="salary-to"
                                            class="form-control custom-width" />
                                    </div>
                                </div>

                                <!-- Search Button -->
                                <button type="submit" class="btn btn-primary mt-2 w-100">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Job Listings -->
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg">
                            <h4>Job Listing</h4>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">
                            @forelse ($jobs as $job)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="thumb">
                                                @if ($job->hr->img)
                                                    <img src="{{ Storage::url($job->hr->img) }}" alt=""
                                                        class="job-thumbnail">
                                                @else
                                                    <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}"
                                                        alt="" class="job-thumbnail">
                                                @endif
                                            </div>
                                            <div class="jobs_conetent">



                                                @if (!Auth::check())
                                                    <a href="{{ route('login') }}">
                                                        <h4>{{ $job->job_title }}</h4>
                                                    </a>
                                                @elseif (!$check_user)
                                                    <a href="{{ route('login_user') }}">
                                                        <h4>{{ $job->job_title }}</h4>
                                                    </a>
                                                @else
                                                    <a href="{{ route('job_details_page', $job->id) }}"
                                                        target="_blank">
                                                        <h4>{{ $job->job_title }}</h4>
                                                    </a>
                                                @endif
                                                <div class="links_locat d-flex align-items-center">
                                                    <div class="location">
                                                        <p><i
                                                                class="fa fa-map-marker"></i>{{ $job->hr->company_location }}
                                                        </p>
                                                    </div>
                                                    <div class="location">
                                                        <p><i class="fa fa-clock-o"></i>{{ $job->employment_type }}</p>
                                                    </div>
                                                    <div class="salary">
                                                        <p><i class="fa fa-dollar-sign"></i>{{ $job->salary }}
                                                            {{ $job->salary_period }}</p>
                                                    </div>
                                                </div>

                                                <div class="date">
                                                    <p>{{ $job->experience_years }} years</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobs_right">
                                            <div class="apply_now">
                                                @if (Auth::user())
                                                    <livewire:LoveJob :jobId="$job->id">
                                                @endif
                                            </div>

                                            @if (!Auth::check())
                                                <a href="{{ route('login') }}" target="_blank"
                                                    class="btn btn-primary  btn-lg">login</a>
                                            @elseif (!$check_user)
                                                <a href="{{ route('login_user') }}" class="btn btn-primary">Create
                                                    Profile user</a>
                                            @else
                                                <a href="{{ route('job_details_page', $job->id) }}" target="_blank"
                                                    class="boxed-btn3">Apply Now</a>
                                            @endif
                                            <div class="date">
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
                                                <p class="date">Posted {{ $displayTime }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle"></i> <strong>No jobs found matching your search
                                        criteria.</strong>
                                    <p>Try adjusting your search options or expanding the search range to get more
                                        results.</p>
                                </div>
                            @endforelse

                            <div class="row">
                                <div class="col-lg-12">
                                    @if ($jobs->hasPages())
                                        <ul class="pagination justify-content-center">
                                            <!-- زر الصفحة السابقة -->
                                            @if ($jobs->onFirstPage())
                                                <li class="page-item disabled"><span class="page-link">previous</span>
                                                </li>
                                            @else
                                                <li class="page-item"><a href="{{ $jobs->previousPageUrl() }}"
                                                        class="page-link" rel="prev">previous</a></li>
                                            @endif

                                            <!-- أرقام الصفحات -->
                                            @foreach (range(1, $jobs->lastPage()) as $page)
                                                <li
                                                    class="page-item {{ $page == $jobs->currentPage() ? 'active' : '' }}">
                                                    <a href="{{ $jobs->url($page) }}"
                                                        class="page-link">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            <!-- زر الصفحة التالية -->
                                            @if ($jobs->hasMorePages())
                                                <li class="page-item"><a href="{{ $jobs->nextPageUrl() }}"
                                                        class="page-link" rel="next">Next</a></li>
                                            @else
                                                <li class="page-item disabled"><span class="page-link">Next</span>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
