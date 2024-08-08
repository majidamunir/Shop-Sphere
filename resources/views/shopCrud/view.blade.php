<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Shop Details</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h3>{{ $shop->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Address:</strong> {{ $shop->address }}</p>
            <p><strong>Owner:</strong> {{ $shop->owner->name }}</p>
            <p><strong>Created At:</strong> {{ $shop->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $shop->updated_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('shops.index') }}" class="btn btn-secondary">Back to Shops</a>
        <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-primary">Edit Shop</a>
        <form action="{{ route('shops.destroy', $shop->id) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shop?');">Delete Shop</button>
        </form>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
