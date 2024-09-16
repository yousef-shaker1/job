@extends('layouts.master')

@section('title')
jobs
@endsection

@section('css')
<style>
    .job-category-listing {
    background-color: #fff; /* خلفية بيضاء */
    border-radius: 8px; /* زوايا مدورة */
    padding: 20px; /* مساحة داخلية */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* ظل خفيف */
    width: 250px;
    margin-left: -20px;
    margin-top: 25px;
}

.single-listing h5 {
    font-weight: bold; /* جعل العناوين أكثر بروزًا */
}

.single-listing {
    margin-bottom: 20px; /* زيادة المسافة بين الأقسام */
}

.single-listing label {
    cursor: pointer; /* تغيير شكل المؤشر عند التمرير على الخيارات */
}
.job-thumbnail {
    width: 77px;
    height: 78px;
    object-fit: cover;
    border-radius: 5px;
    margin-left: -13px;
    margin-top: -14px;
}

.jobs_content .salary {
    margin-left: auto; /* يدفع السعر إلى الجانب الأيمن */
    position: relative;
    z-index: 1; /* التأكد من أن السعر يظهر فوق العناصر الأخرى */
}
.jobs_content .links_locat .salary p {
    padding-left: 10px; /* تأخير عرض السعر قليلاً */
    padding-top: -100px; /* تأخير عرض السعر قليلاً */
}
.custom-width {
    width: 40%; /* يمكنك تعديل هذه القيمة حسب حجمك المفضل */
}
.apply_now{
    margin-right: -150px;
}

.pagination .page-link {
    color: #28a745; /* اللون الأخضر للنص */
    border: 1px solid #28a745; /* اللون الأخضر للإطار */
}

.pagination .page-item.active .page-link {
    background-color: #28a745; /* اللون الأخضر للخلفية */
    border-color: #28a745; /* اللون الأخضر للإطار */
    color: white; /* لون النص داخل العنصر النشط */
}

.pagination .page-item .page-link:hover {
    background-color: #218838; /* لون خلفية أخضر داكن عند التمرير بالفأرة */
    border-color: #218838; /* لون الإطار عند التمرير بالفأرة */
    color: white; /* لون النص عند التمرير بالفأرة */
}

.pagination .page-item.disabled .page-link {
    color: #ccc; /* لون النص للزر المعطل */
    background-color: #f8f9fa; /* خلفية زر المعطل */
    border-color: #ddd; /* لون الإطار للزر المعطل */
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css" rel="stylesheet">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/slicknav/1.0.10/jquery.slicknav.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
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