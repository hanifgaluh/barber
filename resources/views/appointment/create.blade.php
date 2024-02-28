@extends('appointment.layout')

@section('content')
<h2>Create New Appointment</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('appointment.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name_customer">Customer Name:</label>
        <input type="text" name="name_customer" class="form-control" placeholder="Customer Name">
    </div>

    <div class="form-group">
        <label for="hair_artist">Hair Artist:</label>
        <input type="text" name="hair_artist" class="form-control" placeholder="Hair Artist">
    </div>

    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" name="date" class="form-control">
    </div>

    <div class="form-group">
        <label for="time">Time:</label>
        <input type="time" name="time" class="form-control">
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price" class="form-control" placeholder="Price">
    </div>

    <div class="form-group">
        <label for="store">Store:</label>
        <input type="text" name="store" class="form-control" placeholder="Store">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
