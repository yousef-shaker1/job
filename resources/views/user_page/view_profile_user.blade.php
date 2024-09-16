<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <!-- إضافة Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
            color: #1a202c;
            background-color: #f8f9fa;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            border-radius: .25rem;
            background-color: #fff;
        }

        /* .rounded-circle {
      border: 2px solid #6c757d;
    } */
        .progress-bar {
            transition: width 0.5s;
        }

        .main-breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }

        .rounded-circle {
            border-radius: 50%;
            width: 150px;
            /* تأكد من أن العرض والارتفاع متساويان */
            height: 150px;
            object-fit: cover;
            /* تأكد من أن الصورة تملأ الحاوية بشكل صحيح */
        }
        .edit-icon {
    top: 0;
    right: 0;
    transform: translate(50%, -50%);
    cursor: pointer;
    background: white; /* Add a background to make it more visible */
    border-radius: 50%;
    padding: 5px;
}

.card-body {
    position: relative;
}
</style>
@livewireStyles
</head>

<body>
    @if($check == 1)
    <livewire:user-profile />
    
    @else 
    <livewire:user-profile :id="$id" />
    @endif
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
