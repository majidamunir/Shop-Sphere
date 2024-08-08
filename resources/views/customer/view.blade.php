<!-- resources/views/customer/shops.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Shops</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">View Shops</h1>

    @if($shops->isEmpty())
        <p class="text-center">No shops available.</p>
    @else
        <table class="table table-bordered mt-4">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Owner Email</th>
                <th>Select Product</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $shop)
                <tr>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->address }}</td>
                    <td>{{ $shop->owner->email }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">Select Product</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-left mt-4">
        <a href="{{ route('customer.page') }}" class="btn btn-secondary">Back to Customer Dashboard</a>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
