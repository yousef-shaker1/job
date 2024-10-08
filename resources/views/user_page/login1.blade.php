@extends('layouts.master')

@section('title')
Login
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{URL::asset('assets/css/login1.css')}}">

@endsection

@section('content')

<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Find Your Ideal Job or Employer Profile</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <br>
    <h2>Choose Your Login Option : </h2>
    <div class="login-option">
        <a href="{{ route('login_clint') }}" class="btn btn-job-seeker">
            <i class="fas fa-file-alt"></i>Create Job Seeker Profile
        </a>
        <a href="{{ route('login_hr') }}" class="btn btn-employer">
            <i class="fas fa-briefcase"></i>Create Employer Profile
        </a>
    </div>
</div>
<br>
@endsection

@section('js')

@endsection
