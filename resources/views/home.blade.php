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
                        <a href="{{ route('logout') }}" class="logout-btn"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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

                        <!-- Button to list products (show the modal) -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#listProductModal">
                            List Product
                        </button>

                        <!-- Display user's listed products -->
                        <div class="mt-3">
                            <h5>Your Listed Products</h5>
                            @foreach ($user->products as $product)
                                <!-- Display each product here -->
                                <div class="mb-2">
                                    <strong>{{ $product->name }}</strong> - {{ $product->category }} - KES.
                                    {{ $product->price }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the modals for listing and deleting products -->
    <!-- Modal for listing products -->
    <div class="modal fade" id="listProductModal" tabindex="-1" aria-labelledby="listProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listProductModalLabel">List Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your listing product form goes here -->
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="Laptops">Laptops</option>
                                <option value="Smartphones">Smartphones</option>
                                <option value="Cameras">Cameras</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Product Description</label>
                            <textarea class="form-control" id="productDescription" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Images (Up to 5)</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label">Video (Optional)</label>
                            <input type="file" class="form-control" id="video" name="video" accept="video/*">
                        </div>
                        <button type="submit" class="btn btn-primary">List Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
