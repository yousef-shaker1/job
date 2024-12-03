@extends('layouts.master')

@section('title')
Featured job
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
                       <h3>Featured Job</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
<livewire:featured-job>
@endsection

@section('js')

@endsection