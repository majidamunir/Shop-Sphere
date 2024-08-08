<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Edit Shop</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shops.update', $shop->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Shop Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $shop->name }}" required>
        </div>

        <div class="form-group">
            <label for="address">Shop Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $shop->address }}" required>
        </div>

        <div class="text-left mt-4">
            <button type="submit" class="btn btn-primary">Update Shop</button>
            <a href="{{ route('shops.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
