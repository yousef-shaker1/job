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
    .form {
      width: 200%; 
    }
    .main-body {
      padding: 15px;
    }
    .card {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
      border-radius: .25rem;
      background-color: #fff;
      margin-bottom: 20px;
    }
    .rounded-circle {
      border: 2px solid #6c757d;
    }
    .progress-bar {
      transition: width 0.5s;
    }
    .form-control {
      margin-bottom: 10px;
    }
    .btn-info, .btn-success {
      width: 100px;
    }
    .btn-group {
      display: flex;
      justify-content: flex-end;
    }

    .breadcrumb {
    padding: 0.5rem 1rem; /* تقليل padding لتقليل الطول */
    background-color: #959aa038; /* خلفية فاتحة */
    border-radius: 0.375rem; /* زوايا دائرية */
    width: 190%; /* عرض الشريط بالكامل */
    max-width: 1000px; /* عرض أقصى للشريط */
    margin: 8px auto; /* توسيط الشريط */
  }
  
  .breadcrumb-item {
    font-size: 0.875rem; /* حجم الخط */
}
  </style>
</head>
<body>
  <div class="container">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                @if($hr->img)
                <a href="{{ asset('storage/' . $hr->img) }}">
                  <img src="{{ asset('storage/' . $hr->img) }}" alt="Admin" class="rounded-circle" width="130"></a>
                  @else
                  <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="hr" class="rounded-circle" width="150">
                  @endif
                <div class="mt-3">
                  <h4>{{ $hr->first_name }} {{ $hr->last_name }}</h4>
                  <p class="text-muted font-size-sm">{{ $hr->business_email }}</p>
                  <p class="text-secondary mb-1">{{ $hr->company_name }}-{{ $hr->company_location }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <livewire:edit-profile-hr :hr="$hr" />
      </div>
    </div>
  </div>
  <!-- إضافة JavaScript الخاص بـ Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>