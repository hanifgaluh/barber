<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Schedule</title>
</head>
<body>
    <h2>Pilih Waktu</h2>
    <form action="{{ route('submit_date') }}" method="POST">
        @csrf
        <label for="date">Pilih Tanggal:</label>
        <input type="date" name="date" id="date">
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
