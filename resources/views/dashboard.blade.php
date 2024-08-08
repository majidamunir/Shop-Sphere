<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Full viewport height */
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
        .logout-btn {
            margin-top: 10px; /* Pushes button to the end of the container */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Main Content -->
    <h1 class="text-center mb-4">Shop Sphere</h1>
    <div class="row">
        <!-- Add Shop Card -->
        <div class="col-md-6 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h5 class="card-title">Add Shop</h5>
                    <p class="card-text">Add a new shop to the system and only the owner can add a shop.</p>
                    <a href="{{ route('shop.add') }}" class="btn btn-primary">Go to Add Shop</a>
                </div>
            </div>
        </div>

        <!-- View Shops Card -->
        <div class="col-md-6 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h5 class="card-title">View Shops</h5>
                    <p class="card-text">View all the shops that the owner can create, update, and delete.</p>
                    <a href="{{ route('shops.index') }}" class="btn btn-info">View Shops</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Shopkeeper Page Card -->
        <div class="col-md-6 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h5 class="card-title">Shopkeeper</h5>
                    <p class="card-text">Access the Shopkeeper dashboard to manage shops and view details.</p>
                    <a href="{{ route('shopkeeper.page') }}" class="btn btn-secondary">Go to Shopkeeper</a>
                </div>
            </div>
        </div>

        <!-- Customer Page Card -->
        <div class="col-md-6 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h5 class="card-title">Customer</h5>
                    <p class="card-text">View and manage your bookings and preferences as a customer.</p>
                    <a href="{{ route('customer.page') }}" class="btn btn-success">Go to Customer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="logout-btn text-right">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
