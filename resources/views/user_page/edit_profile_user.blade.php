<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile User</title>
    <!-- إضافة Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/css/edit_profile_user.css')}}">
    @livewireStyles
</head>

<body>
    @livewireScripts
  <livewire:EditUserProfile/>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
  function toggleAcademicYearDiv(checkbox) {
        const universityYearDiv = document.getElementById('university_year_div');
        const academicYearDiv = document.getElementById('academic_year_div');
        
        if (checkbox.checked) {
            universityYearDiv.style.display = 'none'; // إخفاء الـ select
            academicYearDiv.style.display = 'block'; // إظهار الـ input
        } else {
            universityYearDiv.style.display = 'block'; // إظهار الـ select
            academicYearDiv.style.display = 'none'; // إخفاء الـ input
        }
        
        if (checkbox.checked) {
            document.getElementById('academic_year').value = null;
        }
    } 
        </script>
</body>

</html>
