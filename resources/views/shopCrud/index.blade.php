<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shops List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Your Shops</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($shops) && $shops->isEmpty())
        <p class="text-center">No shops available. <a href="{{ route('shop.add') }}">Add a new shop</a>.</p>
    @elseif(isset($shops))
        <table class="table table-bordered mt-4">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $shop)
                <tr>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->address }}</td>
                    <td>
                        <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('shops.destroy', $shop->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this shop?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center text-danger">Failed to load shops data.</p>
    @endif

    <div class="text-left mt-4">
        <a href="{{ route('shop.add') }}" class="btn btn-success">Add New Shop</a>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
