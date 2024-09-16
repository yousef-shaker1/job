@extends('layouts.master')

@section('title')
about
@endsection

@section('css')

@endsection


@section('content')
<!-- Bradcam Area -->
<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text">
          <h3>About</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Main content start -->
<main>

  <!-- Hero Area Start -->
  <div class="slider-area">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" style="background-image: url('https://images.unsplash.com/photo-1553484771-9d7b2b67c3f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="hero-cap text-center">
              <h1 class="text-white">Join Us and Find Your Dream Job</h1>
              <p class="text-light">Empowering Talent Since 2024</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero Area End -->

  <!-- Support Company Start -->
  <div class="support-company-area fix section-padding2">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6">
          <div class="right-caption">
            <!-- Section Title -->
            <div class="section-tittle section-tittle2">
              <span>Our Mission</span>
              <h2>Empowering 24k Talented People to Get Jobs</h2>
            </div>
            <div class="support-caption">
              <p class="pera-top">We are dedicated to connecting talented individuals with the right job opportunities, ensuring a perfect match for both candidates and employers.</p>
              <p>Our platform makes the job search and application process seamless, from exploring job listings to landing your dream job. Join us and become part of the success stories of thousands who have found their perfect job through our platform.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6">
          <div class="support-location-img">
            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Job Search" class="img-fluid">
            <div class="support-img-cap text-center">
              <div>Connecting Talent</div>
              <span>Since 2024</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Support Company End -->

  <!-- How Apply Process Start -->
  <div class="apply-process-area apply-bg pt-150 pb-150" >
    <div class="container">
      <!-- Section Title -->
      <div class="row">
        <div class="col-lg-12">
          <div class="section-tittle white-text text-center">
            <span>Application Process</span>
            <h2>How It Works</h2>
          </div>
        </div>
      </div>
      <!-- Apply Process Caption -->
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single-process text-center mb-30">
            <div class="process-ion">
              <i class="fa fa-search"></i>
            </div>
            <div class="process-cap">
              <h5>1. Search for a Job</h5>
              <p>Explore thousands of job listings to find the right opportunity that matches your skills and interests.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="single-process text-center mb-30">
            <div class="process-ion">
              <i class="fa fa-file-text"></i>
            </div>
            <div class="process-cap">
              <h5>2. Apply for the Job</h5>
              <p>Submit your application with a few clicks and get noticed by top employers in your industry.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="single-process text-center mb-30">
            <div class="process-ion">
              <i class="fa fa-check"></i>
            </div>
            <div class="process-cap">
              <h5>3. Get Hired</h5>
              <p>Receive offers, attend interviews, and secure your dream job with the support of our platform.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- How Apply Process End -->

</main>

<!-- Main content end -->

@endsection

@section('js')

@endsection
