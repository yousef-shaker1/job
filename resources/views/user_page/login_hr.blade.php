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
  <title>Create Profile human resources</title>
 <style>
  .form-group {
    position: relative;
}

.form-group .icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #aaa; /* لون أيقونة القفل */
}

.form-group .toggle-password {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #aaa; /* لون أيقونة العين */
}

.form-control {
    /* padding-left: 2.5rem; */
    padding-right: 2.5rem; 
    border-radius: 5px;
    border: 1px solid #ddd; /
}

.form-control:focus {
    border-color: #007bff; /* لون الحدود عند التركيز */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* تأثير الظل عند التركيز */
}

 </style>
</head>
<body>
  <div class="container">
    <h2>Create Your Profile</h2>
    <livewire:MultiFormHr />
    <br>
</div>
@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var input = document.querySelector("#phone");
    intlTelInput(input, {
        preferredCountries: ['us', 'gb'], 
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" 
    });
});


document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('business_password');
    var passwordType = passwordInput.getAttribute('type');
    if (passwordType === 'password') {
        passwordInput.setAttribute('type', 'text');
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash'); 
    } else {
        passwordInput.setAttribute('type', 'password');
        this.classList.remove('fa-eye-slash');
        this.classList.add('fa-eye'); 
    }
});

</script>

</body>
</html>
