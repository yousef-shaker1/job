@extends('layouts.master_admin')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

@section('title')
 admin
@endsection

@section('content')
<div class="container mt-4">
  <!-- row -->
<div class="row g-3">
<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card text-white bg-danger mb-3">
        <div class="card-body">
            <h6 class="card-title">all job</h6>
            <h4 class="card-text">
                {{\App\Models\Position::count()}} job
            </h4>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card text-white bg-primary mb-3">
        <div class="card-body">
            <h6 class="card-title">user</h6>
            <h4 class="card-text">
                {{\App\Models\UserProfile::count() }} user
            </h4>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card text-white bg-success mb-3">
        <div class="card-body">
            <h6 class="card-title">Human Resources</h6>
            <h4 class="card-text">
                {{\App\Models\HrAccount::count() }} hr
            </h4>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card text-white bg-warning mb-3">
        <div class="card-body">
            <h6 class="card-title">Blogs</h6>
            <h4 class="card-text">
                {{\App\Models\blog::count()}} blog
            </h4>
        </div>
    </div>
</div>

</div>

</div>
@endsection
@section('js')

@endsection