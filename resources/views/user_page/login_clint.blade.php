<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.0/tagify.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">

  
  <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/login_clint.css')}}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create Profile</title>
 
</head>
<body>
  <div class="container">
    <h2>Create Your Profile</h2>
    
    <livewire:MultiStepForm />
    <br>
</div>
@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var input = document.querySelector("#phone");
    intlTelInput(input, {
        preferredCountries: ['us', 'gb'], // يمكنك تغيير الدول المفضلة هنا
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // لتحسين التحقق من الرقم
    });
});

</script>
<script>
    function toggleAcademicYearDiv(checkbox) {
        let endMonth = document.getElementById('end_date_month_university');
        let endYear = document.getElementById('end_date_year_university');
        let academicYearDiv = document.getElementById('academic_year_div');

        if (checkbox.checked) {
            endMonth.value = "";
            endYear.value = "";
            endMonth.disabled = true;
            endYear.disabled = true;
            academicYearDiv.style.display = "block";
        } else {
            endMonth.disabled = false;
            endYear.disabled = false;
            academicYearDiv.style.display = "none";
        }
    }
</script>

</body>
</html>
