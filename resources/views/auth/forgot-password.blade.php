<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 500px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .text-center h1 {
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        .form-control {
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="h4">Forgot Your Password?</h1>
            <p class="text-muted">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
        </div>

        <!-- Session Status -->
        <div class="mb-4">
            <!-- Include any session status or error messages here -->
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus />
                @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
