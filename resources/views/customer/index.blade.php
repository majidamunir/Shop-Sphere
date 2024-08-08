<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
        }
        .logout-btn {
            margin-left: 0px; /* Spacing between buttons */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Customer Dashboard</h1>

    <!-- Buttons Row -->
    <div class="d-flex justify-content-center mt-4">
        <!-- Link to View Shops -->
        <a href="{{ route('customer.view.shops') }}" class="btn btn-info mr-2">View Shops</a>

{{--        <!-- Link to Main Dashboard -->--}}
{{--        <a href="{{ route('dashboard') }}" class="btn btn-primary mr-2">Dashboard</a>--}}

        <!-- Logout Button -->
        <div class="logout-btn">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
