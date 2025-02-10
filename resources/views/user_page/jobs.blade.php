@extends('layouts.master')

@section('title')
jobs
@endsection

@section('css')
<link rel="stylesheet" href="{{URL::asset('assets/css/jobs.css')}}">
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css" rel="stylesheet"> --}}
@endsection


@section('content')
    @if(!empty($contry) || !empty($job_name))
        @livewire('jobs-all',['job_name' => $job_name, 'country' => $country, 'section_id' => $section_id])
    @elseif(!empty($section_id))
        @livewire('jobs-all',['section_id' => $section_id])
    @else
        @livewire('jobs-all')   
    @endif
  <!-- job_listing_area_end  -->
@endsection

@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slicknav/1.0.10/jquery.slicknav.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"></script> --}}

<script>
    $(document).ready(function() {
        // تفعيل slicknav
        $('.menu').slicknav();

        // معالجة أي أخطاء تتعلق بـ slicknav أو validate
        // تأكد من وجود العنصر قبل محاولة تعديل خصائصه
        if ($('#someElement').length) {
            // القيام بعمليات مع العنصر
        }

        // التعامل مع أحداث Livewire
        document.addEventListener('livewire:load', function () {
            Livewire.on('refreshForm', () => {
                // إعادة تعيين النموذج أو تحديثه هنا
            });
        });
    });
</script>

@endsection