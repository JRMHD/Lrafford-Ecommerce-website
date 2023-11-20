<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" type="image/x-icon" href="\img\lr-png.ico">

    <!-- Or for PNG format -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Reset Password') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            /* Light Grey */
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 0;
            /* No Border */
            border-radius: 10px;
            /* Rounded Corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #dc3545;
            /* Red */
            color: #fff;
            /* White */
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 2rem;
            text-align: center;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #dc3545;
            /* Red */
            border-color: #dc3545;
            /* Red */
            padding: 10px 20px;
            color: #fff;
            /* White */
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            /* Slight Border Radius */
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #c82333;
            /* Darker Red on Hover */
            border-color: #c82333;
            /* Darker Red on Hover */
        }

        .btn-secondary {
            background-color: #343a40;
            /* Dark Grey */
            border-color: #343a40;
            /* Dark Grey */
            padding: 10px 20px;
            color: #fff;
            /* White */
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            /* Slight Border Radius */
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #23272b;
            /* Darker Grey on Hover */
            border-color: #23272b;
            /* Darker Grey on Hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Reset Password') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>

                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
