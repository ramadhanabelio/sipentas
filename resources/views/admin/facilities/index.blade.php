<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Facilities</title>
</head>

<body>
    <h1>Manage Facilities</h1>
    <a href="{{ route('admin.facilities.create') }}">Add New Facility</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilities as $facility)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->description }}</td>
                    <td>{{ $facility->location }}</td>
                    <td>{{ $facility->quantity }}</td>
                    <td>
                        <a href="{{ route('admin.facilities.edit', $facility) }}">Edit</a>
                        <form action="{{ route('admin.facilities.destroy', $facility) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
