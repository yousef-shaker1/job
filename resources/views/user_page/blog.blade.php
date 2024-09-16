@extends('layouts.master')

@section('title')
blog
@endsection

@section('css')
<style>
    .article-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .sidebar {
        background-color: #f8f9fa;
        padding: 20px;
    }
    .blog-title {
        font-weight: bold;
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
                  <h3>blog</h3>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ bradcam_area  -->

<div class="container">
    <div class="row mt-5">
        <!-- Main Content -->
        <div class="col-md-12">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($blog->img) }}" class="card-img-top article-image" alt="Article Image">
                        <div class="card-body">
                            <h5 class="card-title blog-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->body }}</p>
                            <a href="{{ route('single_blog', $blog->id) }}" class="btn btn-primary">read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
