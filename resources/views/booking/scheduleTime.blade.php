<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Schedule</title>
    <style>
        /* Ganti warna latar belakang dan warna teks tombol saat belum dipilih */
        button {
            background-color: gold;
            /* Warna emas */
            color: black;
        }

        /* Ganti warna latar belakang dan warna teks tombol saat sudah dipilih */
        button.selected {
            background-color: black;
            /* Warna hitam */
            color: gold;
            /* Warna emas */
        }
    </style>
</head>

<body>
    <h2>Pilih Waktu</h2>
    <label for="disabledTextInput" class="form-label">{{$date}}</label>
    <form action="{{ route('submit_time') }}" method="POST">
        @csrf
        <br>
        <label>Pilih Waktu:</label>
        <br>
        @foreach($available_times as $time)
        @if(!$used_times->contains($time))
        <button type="button" onclick="selectTime(this, '{{ $time }}')" id="{{ $time }}">{{ $time }}</button>
        @endif
        @endforeach
        <input type="hidden" name="time" id="selected-time">
        <br>
        <button type="submit">Submit</button>
    </form>

    <script>
        function selectTime(button, time) {
            // Jika tombol sudah dipilih, jangan lakukan apa pun
            if (button.classList.contains('selected')) {
                return;
            }

            // Hapus kelas 'selected' dari semua tombol waktu
            var buttons = document.querySelectorAll('button');
            buttons.forEach(function(btn) {
                btn.classList.remove('selected');
            });

            // Tambahkan kelas 'selected' pada tombol yang diklik
            button.classList.add('selected');

            // Setel nilai waktu yang dipilih
            document.getElementById('selected-time').value = time;
        }
    </script>
</body>

</html>
