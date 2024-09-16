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
                  <h3>Internships</h3>
              </div>
          </div>
      </div>
  </div>
</div>
@livewire('Internship')
@endsection

@section('js')

@endsection