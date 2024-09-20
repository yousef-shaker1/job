@extends('layouts.master')

@section('title')
jobs
@endsection

@section('css')
<link rel="stylesheet" href="{{URL::asset('assets/css/search_page.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css" rel="stylesheet">
@endsection


@section('content')
@livewire('jobs-all',['job_name' => request('job_name'), 'country' => request('country')])
  <!-- job_listing_area_end  -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var salarySlider = document.getElementById('salary-range-slider');
    
        noUiSlider.create(salarySlider, {
            start: [0, 1000], // القيم الافتراضية
            connect: true,
            range: {
                'min': 0,
                'max': 10000
            },
            tooltips: [true, true],
            format: {
                to: function (value) {
                    return Math.round(value);
                },
                from: function (value) {
                    return Number(value);
                }
            }
        });
    
        salarySlider.noUiSlider.on('update', function (values, handle) {
            // تحديث القيم في حقول الإدخال
            document.getElementById('salary-from').value = values[0];
            document.getElementById('salary-to').value = values[1];
    
            // إرسال القيم إلى Livewire
            Livewire.emit('salaryRangeUpdated', values[0], values[1]);
        });
    });
    </script>
@endsection