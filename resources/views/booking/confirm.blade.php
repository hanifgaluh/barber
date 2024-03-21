@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 400px; margin: 0 auto;">
    <div class="card-body">
        <h2 class="card-title text-center">Confirm Booking</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->email}}</li>
            <li class="list-group-item"><strong>Hair Artist:</strong> {{ $staff->name }}</li>
            <li class="list-group-item"><strong>Store:</strong> {{ $staff->loc_store }}</li>
            <li class="list-group-item"><strong>Date:</strong> {{ $date }}</li>
            <li class="list-group-item"><strong>Time:</strong> {{ $time }}</li>
            <li class="list-group-item"><strong>Price:</strong> {{ $price }}</li>
        </ul>

        <form method="POST" action="{{ route('confirm') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Payment</button>
        </form>

    </div>
</div>
@endsection
