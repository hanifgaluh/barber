<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
</head>
<body>
    <h1>Staff List</h1>
    <a href="{{ route('staff.create') }}" class="btn btn-success">Add New Staff</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Description</th>
                <th>Price</th>
                <th>loc_store</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
            <tr>
                <td>{{ $staff->name }}</td>
                <td><img src="{{ asset('storage/photos/' . $staff->photo) }}" alt="{{ $staff->name }}" width="100"></td>
                <td>{{ $staff->description }}</td>
                <td>{{ $staff->price }}</td>
                <td>{{ $staff->loc_store}}</td>
                <td>
                    <a href="{{ route('staff.create', $staff->id) }}" class="btn btn-primary">create</a>    
                    <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>