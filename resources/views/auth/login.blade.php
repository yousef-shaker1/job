<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* styles.css */

/* إعدادات عامة للجسم */
body {
    background-color: #f8f9fa;
}

/* إعدادات للبطاقة */
.card {
    border: none;
    border-radius: 8px;
    overflow: hidden;
}
/* تصميم زر Google */
.btn-google {
    border-color: #db4437; /* اللون الأحمر المميز لجوجل */
    color: #db4437;
    background-color: transparent;
    transition: all 0.3s ease-in-out;
}

.btn-google:hover {
    background-color: #db4437;
    color: #fff;
    box-shadow: 0 4px 6px rgba(219, 68, 55, 0.2); /* ظل خفيف */
}

/* تصميم زر GitHub */
.btn-github {
    border-color: #24292e; /* اللون الداكن المميز لـ GitHub */
    color: #24292e;
    background-color: transparent;
    transition: all 0.3s ease-in-out;
}

.btn-github:hover {
    background-color: #24292e;
    color: #fff;
    box-shadow: 0 4px 6px rgba(36, 41, 46, 0.2); /* ظل خفيف */
}

.google-logo, .github-logo {
    width: 20px;
    height: 20px;
    margin-right: 10px; /* مسافة بسيطة بين الشعار والنص */
}


    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Login</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                        <hr>
                        <a href="{{ route('googlepage') }}" class="btn btn-google btn-block">
                            <img src="{{ URL::asset('assets/img/images.png') }}" alt="Google Logo" class="google-logo"> 
                            Login with Google
                        </a>
                        
                        <hr>
                        
                        <a href="{{ route('githubpage') }}" class="btn btn-github btn-block">
                            <img src="{{ URL::asset('assets/img/github.png') }}" alt="Github Logo" class="github-logo"> 
                            Login with Github
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
