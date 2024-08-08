<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            margin-top: 50px;
            margin-bottom: 30px;
        }
        .dashboard-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .dashboard-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            text-align: center;
        }
        .btn-lg {
            padding: 10px 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="dashboard-header text-center">
                <h1>Welcome to the Shop Sphere</h1>
                <p class="lead">Choose an option below to proceed.</p>
            </div>
            <div class="row">
                <!-- Register Card -->
                <div class="col-md-6 mb-4">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title">Register</h5>
                            <p class="card-text">Create a new Account.</p>
                            <a href="{{ route('register.form') }}" class="btn btn-primary btn-lg">Register</a>
                        </div>
                    </div>
                </div>

                <!-- Login Card -->
                <div class="col-md-6 mb-4">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5 class="card-title">Login</h5>
                            <p class="card-text">Access your Account.</p>
                            <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
