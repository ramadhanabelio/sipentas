<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Facility</title>
</head>

<body>
    <h1>Edit Facility</h1>
    <form action="{{ route('admin.facilities.update', $facility) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $facility->name }}" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required>{{ $facility->description }}</textarea>
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location" value="{{ $facility->location }}">
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" value="{{ $facility->quantity }}" min="1" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>

</html>
