{{-- app/resources/views/appointment/show.blade.php --}}
@extends('appointment.layout')

@section('content')
<h2>Show Appointment</h2>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Customer Name: {{ $appointment->name_customer }}</h5>
        <p class="card-text">Hair Artist: {{ $appointment->hair_artist }}</p>
        <p class="card-text">Date: {{ $appointment->date }}</p>
        <p class="card-text">Time: {{ $appointment->time }}</p>
        <p class="card-text">Price: {{ $appointment->price }}</p>
        <p class="card-text">Store: {{ $appointment->store }}</p>
    </div>
</div>

<a href="{{ route('appointment.index') }}" class="btn btn-primary">Back</a>
@endsection
