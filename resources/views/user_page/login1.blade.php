@extends('layouts.master')

@section('title')
Login
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* تحسين تصميم الزرارين */
    .login-option {
        display: flex;
        justify-content: center; /* لضبط الزرارين في الوسط */
        gap: 20px;
        margin-top: 30px;
    }

    .login-option a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 300px; /* عرض أكبر ليتناسب مع النص الكامل */
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #fff;
        border-radius: 8px;
        border: 2px solid transparent;
        transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        gap: 10px; /* مسافة بين الأيقونة والنص */
    }

    .btn-job-seeker {
        background-color: #28a745;
    }

    .btn-job-seeker:hover {
        background-color: #218838;
    }

    .btn-employer {
        background-color: #007bff;
    }

    .btn-employer:hover {
        background-color: #0056b3;
    }

    .btn:active {
        transform: translateY(2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .login-option h2 {
        font-size: 24px;
        margin-bottom: 15px;
    }

    .container {
        text-align: center;
    }

    .btn img {
        width: 24px; /* حجم الأيقونة */
        height: 24px; /* حجم الأيقونة */
    }
</style>
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
