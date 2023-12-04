<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" type="image/x-icon" href="\img\lr-png.ico">

    <!-- Or for PNG format -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('List Product') }}</title>

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

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #dc3545;
            /* Red */
            border-color: #dc3545;
            /* Red */
        }

        .btn-primary:hover {
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
                        {{ __('List Product') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Your listing product form goes here -->
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
                                <textarea class="form-control" id="productDescription" name="description"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Images (Up to 5)</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple
                                    accept="image/*">
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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


