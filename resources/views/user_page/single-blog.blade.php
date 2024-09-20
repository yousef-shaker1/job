@extends('layouts.master')

@section('title')
single-blog
@endsection

@section('css')
<style>
   .thumb img {
    border-radius: 50%;
    width: 95px; /* يمكنك تغيير الحجم وفقاً لاحتياجاتك */
    height: 79px; /* يمكنك تغيير الحجم وفقاً لاحتياجاتك */
    object-fit: cover; /* لضمان عدم تشويه الصورة */
}

.d-inline-block.d-flex.flex-column {
    display: flex;
    flex-direction: column;
    align-items: center; /* يضمن أن العناصر تكون متمركزة في الوسط */
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
                  <h3>single blog</h3>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ bradcam_area  -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
  <div class="container">
     <div class="row">
        <div class="col-lg-10 posts-list">
           <div class="single-post">
            <div class="feature-img">
               <img class="img-fluid" src="{{ Storage::url($blog->img) }}" alt="" style="width: 400px; height:300px;">
            </div>
              <div class="blog_details">
                 <h2>{{$blog->title}}
                 </h2>
                 <ul class="blog-info-link mt-3 mb-4">
                    <li><a href="#"><i class="fa fa-comments"></i> {{ $count_comment }} Comments</a></li>
                 </ul>
                 <p class="excert">{{ $blog->body }}</p>
              </div>
           </div>
           <div class="navigation-top">
              <div class="d-sm-flex justify-content-between text-center">
               @if(Auth::check())
               <livewire:love-blog :blogId="$blog->id">
               @endif
                 <div class="col-sm-4 text-center my-2 my-sm-0">
                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                 </div>
              </div>
           </div>
           <div class="comments-area">
              <h4>{{ $count_comment }} Comments</h4>
              @foreach ($comment_blogs as $comment_blog)
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                @php
                    $userProfile = $UserProfiles->get($comment_blog->user_id);
                @endphp
                @if($userProfile)
                    <div class="thumb">
                        @if($userProfile->userPersonal->img)
                        <img src="{{ Storage::url($userProfile->userPersonal->img) }}" alt="">
                        @else
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image preview" data-toggle="dropdown">
                        @endif
                    </div>
                @else
                    <div class="thumb">
                        <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image">
                    </div>
                @endif
                <div class="desc">
                    <p class="comment">
                        {{ $comment_blog->comment }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <p class="date">{{ Carbon\Carbon::parse($comment_blog->created_at)->format('d-M-Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

               
           </div>
           @if($check == 1)
           <div class="comment-form">
              <h4>Leave a Reply</h4>
              <form class="form-contact comment_form" action="{{ route('save_comment', $blog->id) }}" method='post' id="commentForm">
               @csrf
                 <div class="row">
                    <div class="col-12">
                       <div class="form-group">
                          <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                             placeholder="Write Comment"></textarea>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                 </div>
              </form>
           </div>
           @endif
        </div>
       
     </div>
  </div>
</section>
@endsection

@section('js')

@endsection