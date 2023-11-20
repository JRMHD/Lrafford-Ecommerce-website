<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" type="image/x-icon" href="\img\lr-png.ico">

    <!-- Or for PNG format -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Dashboard') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            /* Light Grey */
            font-family: 'Arial', sans-serif;
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

        .welcome-text {
            margin-bottom: 20px;
        }

        .user-name {
            font-weight: bold;
            color: #dc3545;
            /* Red */
        }

        .logout-btn {
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

        .logout-btn:hover {
            background-color: #c82333;
            /* Darker Red on Hover */
            border-color: #c82333;
            /* Darker Red on Hover */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Dashboard') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="welcome-text">
                            Welcome back, <span class="user-name">{{ Auth::user()->name }}</span>!
                        </p>

                        <a href="{{ route('logout') }}" class="logout-btn"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
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
