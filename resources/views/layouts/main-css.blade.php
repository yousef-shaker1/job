  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/img/favicon.png')}}">
  <!-- Place favicon.ico in the root directory -->
  
  <!-- CSS here -->
  <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/nice-select.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/gijgo.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/slicknav.css')}}">

  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  

  <style>
.img-thumbnail {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    margin-left: 200px;
    cursor: pointer;
    transition: transform 0.2s;
    margin-right: 10px;
    padding: 1px;
}

.img-thumbnail:hover {
    transform: scale(1.05); /* تكبير الصورة قليلاً عند التمرير فوقها */
}

.dropdown {
    display: inline-block;
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    right: 0;
    top: 100%;
    min-width: 300px;
    padding: 15px;
    max-width: 100%; /* منع تجاوز عرض القائمة */
    box-sizing: border-box; /* تأكد من أن padding لا يتجاوز العرض */
}

.dropdown-menu.show {
    display: block; /* عرض القائمة عند النقر */
}

.dropdown-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    margin-top: -5px;
    margin-left: -20px;
}

.postjob {
  margin-right: -100px;
}

.img-thumbnail-large {
    width: 80px; 
    height: 80px; 
    border-radius: 50%;
    object-fit: cover;
    margin-right: 15px;
}

.user-info {
    flex: 1;
    overflow: hidden;
}

.email, .name {
    margin: 0;
    white-space: nowrap; /* منع الانتقال إلى سطر جديد */
    overflow: hidden;
    text-overflow: ellipsis; 
    margin-left: -1px;
}

.email {
    font-weight: bold;
    color: #333;
}

.name {
    color: #555;
}

.dropdown-item {
    padding: 10px 15px;
    color: #333; /* تغيير لون النص إلى رمادي غامق */
    text-decoration: none;
    display: block;
    transition: background-color 0.3s;
}

.dropdown-item:hover {
    background-color: #f8f9fa; /* تغيير لون الخلفية عند التمرير فوق العنصر */
}

.btn-danger {
    margin-top: 10px;
    width: 100%;
    text-align: center;
    color: #fff;
    background-color: #dc3545;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

        .btn-transparent:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-blue {
            background-color: #007bff;
            color: #fff;
        }

        .btn-blue:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .button-group {
            display: flex;
            gap: 10px; /* Adjust the spacing as needed */
        }
    #navigation {
    display: flex;
    justify-content: space-between;
    list-style: none;
    padding: 0;
    margin: 0;
    }

#navigation li {
  position: relative;
}

#navigation li:hover .submenu {
  display: block;
}
.bradcam_area {
    height: 20vh; /* تحديد نسبة أصغر من ارتفاع نافذة العرض */
    display: flex;
    align-items: center; /* محاذاة العناصر عمودياً */
    justify-content: center; /* محاذاة العناصر أفقياً */
    background-size: cover; /* لتغطية الخلفية بشكل كامل */
}

  </style>
  @livewireStyles
  @yield('css')