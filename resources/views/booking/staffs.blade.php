@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if ($staff->count() > 0)
        @foreach ($staff as $staff)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <img src="/asset/Bangun.jpg" class="rounded float-start" alt="...">
                    <h5 class="card-title">{{ $staff->name }}</h5>
                    <p class="card-text">{{ $staff->price }}</p>
                    <p class="card-text">{{ $staff->id }}</p>
                    <a class="btn btn-primary book-btn" href="#" data-staff-id="{{ $staff->id }}" role="button">Book</a>
                    <a class="btn btn-primary" href="/ProfileStaff/{{ $staff->id }}" role="button">View Profile</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col">
            <div class="alert alert-warning" role="alert">
                No staff found in {{ ucfirst($location) }}.
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Tambahkan JavaScript di sini -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const bookButtons = document.querySelectorAll('.book-btn');
    bookButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const staffId = this.getAttribute('data-staff-id');
            bookStaff(staffId);
        });
    });

    function bookStaff(staffId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/booking', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ staff_id: staffId })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to book staff');
            }
            // Lakukan tindakan setelah booking berhasil, misalnya menampilkan pesan atau memperbarui tampilan
            window.location.href = '/booking/schedule';
        })
        .catch(error => {
            console.error('Booking failed:', error.message);
        });
    }
});

</script>
@endsection
