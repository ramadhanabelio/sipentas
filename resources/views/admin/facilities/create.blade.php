<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Facility</title>
</head>

<body>
    <h1>Add New Facility</h1>
    <form action="{{ route('admin.facilities.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location">
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" value="1" min="1" required>
        </div>
        <button type="submit">Save</button>
    </form>
</body>

</html>
