@extends('layouts.master')

@section('title')
home
@endsection

@section('css')
<style>
    .thumb img{
        width: 79px;
        margin-left: -15px;
        margin-top: -15px;
        border-radius: 6px; /* حواف منحنية */
    }

    /* General Styles for all inputs */
.single_input {
    margin-bottom: 1rem; /* Add margin to bottom of inputs for spacing */
}

.form-control, .form-select {
    width: 100%;
    padding: 0.375rem 0.75rem; /* Padding for consistency */
    border-radius: 0.25rem;    /* Rounded corners */
    border: 1px solid #ced4da; /* Border color */
    background-color: #fff;   /* Background color */
    font-size: 1rem;           /* Font size for text */
}

/* Button Styling */
.btn-primary {
    background-color: #007bff; /* Primary color */
    border: none;              /* Remove default border */
    color: #fff;               /* Text color */
    padding: 0.5rem 1rem;      /* Padding for button */
    border-radius: 0.25rem;    /* Rounded corners */
    cursor: pointer;           /* Cursor pointer on hover */
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .col-md-4 {
        margin-bottom: 1rem; /* Add bottom margin for smaller screens */
    }
}

@media (max-width: 768px) {
    .col-md-12 {
        margin-bottom: 1rem; /* Add bottom margin for smaller screens */
    }
}

</style>
@endsection


@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">4536+ Jobs listed</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="#" class="boxed-btn3">Upload your Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="{{ URL::asset('assets/img/banner/illustration.png') }}" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- catagory_area -->
    <div class="catagory_area">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <div class="container">
            <form action='{{ route('search_job') }}' method='get'>
                @csrf
                <div class="row cat_search">
                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="single_input">
                            <input type="text" class="form-control" placeholder="Search keyword" name="job_name">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="single_input">
                            <select class="form-select" name="country">
                                <option value="" selected>Anywhere</option>
                                <option value="usa">United States</option>
                                <option value="canada">Canada</option>
                                <option value="egypt">Egypt</option>
                                <option value="germany">Germany</option>
                                <option value="france">France</option>
                                <option value="japan">Japan</option>
                                <option value="australia">Australia</option>
                                <option value="switzerland">Switzerland</option>
                                <option value="singapore">Singapore</option>
                                <option value="netherlands">Netherlands</option>
                                <option value="sweden">Sweden</option>
                                <option value="norway">Norway</option>
                                <option value="finland">Finland</option>
                                <option value="denmark">Denmark</option>
                                <option value="south_korea">South Korea</option>
                                <option value="hong_kong">Hong Kong</option>
                                <option value="new_zealand">New Zealand</option>
                                <option value="austria">Austria</option>
                                <option value="ireland">Ireland</option>
                                <option value="luxembourg">Luxembourg</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="single_input">
                            <select class="form-select" name="section_id">
                                <option value="" selected>All</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="job_btn">
                            <button type='submit' class="boxed-btn3">Find Job</button>
                        </div>
                    </div>
                </div>
                
        </form>
        </div>
    </div>
    <!--/ catagory_area -->

    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popolar Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($sections as $section)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="{{ route('search_section', $section->id) }}"><h4>{{ $section->name }}</h4></a>
                        <p> <span>{{ $section->jobs->count() }}</span> Available position</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- popular_catagory_area_end  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="{{ route('jobspage') }}" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    @foreach($jobs as $job)
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
                                    <a href="job_details.html"><h4>{{ $job->job_title }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i>{{ $job->hr->company_location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i>{{ $job->employment_type }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    @if (!Auth::check())
                                        <!-- إذا لم يكن هناك مستخدم مسجل دخول -->
                                        <a href="{{ route('login') }}" target="_blank" class="btn btn-primary btn-lg">Login</a>
                                    @elseif (!$check_user)
                                        <!-- إذا كان المستخدم مسجل دخول ولكن ليس لديه سجل في جدول UserProfile -->
                                        <a href="{{ route('login_user') }}" class="btn btn-primary">Create Profile user</a>
                                    @else
                                        <!-- إذا كان المستخدم مسجل دخول ولديه سجل في جدول UserProfile -->
                                        <livewire:LoveJob :jobId="$job->id">
                                        <a href="{{ route('job_details_page', $job->id) }}" target="_blank" class="boxed-btn3">Apply Now</a>
                                    @endif
                                </div>
                                
                                <div class="date">
                                    <p>Date line: {{ Carbon\Carbon::parse($job->created_at)->format('d-M-Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Featured Candidates</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/1.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/2.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/3.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/4.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/5.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/6.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/7.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/8.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/9.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/9.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/10.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/3.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/img/candiateds/4.png') }}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->

    <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job text-right">
                        <a href="{{ route('jobspage') }}" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="{{ URL::asset('assets/img/svg_icon/5.svg') }}" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="{{ URL::asset('assets/img/svg_icon/4.svg') }}" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="{{ URL::asset('assets/img/svg_icon/3.svg') }}" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="{{ URL::asset('assets/img/svg_icon/1.svg') }}" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="{{ route('jobspage') }}" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a internship?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="{{ route('internship_page') }}" class="boxed-btn3">Browse internships</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->


@endsection

@section('js')

@endsection

