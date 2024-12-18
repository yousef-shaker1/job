@extends('layouts.master')

@section('title')
contant
@endsection

@section('css')

@endsection


@section('content')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
  <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="bradcam_text">
                  <h3>contact</h3>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
<div class="container">
<div class="row">
  <div class="col-12">
    <h2 class="contact-title">Get in Touch</h2>
  </div>
  <div class="col-lg-8">
    @if(session()->has("message"))
    <div class='alert alert-success'>
      {{ session("message") }}
    </div>
    @endif
    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div class='alert alert-danger mb-2'> <!-- يمكنك تغيير الكلاس هنا لتناسب التصميم المطلوب -->
            {{ $error }}
        </div>
    @endforeach
@endif

    <form class="form-contact contact_form" action="{{ route('save_contact') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          
            <textarea class="form-control w-100" name="message" id="message" cols="40" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
        </div>
      </div>
      <div class="form-group mt-3">
        <button type="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
      </div>
    </form>
  </div>
  <div class="col-lg-4">
    <div class="media contact-info">
      <span class="contact-info__icon"><i class="ti-tablet"></i></span>
      <div class="media-body">
        <h3>+201101336383</h3>
      </div>
    </div>
    <div class="media contact-info">
      <span class="contact-info__icon"><i class="ti-email"></i></span>
      <div class="media-body">
        <h3>youssefshaker2cool@gmail.com</h3>
        <p>Send us your query anytime!</p>
      </div>
    </div>
  </div>
</div>
</div>
</section>
@endsection

@section('js')

@endsection