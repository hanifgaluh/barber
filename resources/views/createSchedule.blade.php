<!-- resources/views/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Staff Schedule</title>
</head>
<body>
    <h2>Create Staff Schedule</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('submit-form') }}" method="POST">
        @csrf
        <label for="staff">Select Staff:</label>
        <select name="staff_id" id="staff">
            @foreach($staffs as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        <br>
        <label for="time">Select Time:</label>
        <input type="time" name="time" id="time">
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
