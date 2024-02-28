@extends('appointment.layout')

@section('content')
<h2>All Appointments</h2>

<a href="{{ route('appointment.create') }}" class="btn btn-success">Create New Appointment</a>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Customer Name</th>
        <th>Hair Artist</th>
        <th>Date</th>
        <th>Time</th>
        <th>Price</th>
        <th>Store</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($appointment as $appt)
    <tr>
        <td>{{ $appt->name_customer }}</td>
        <td>{{ $appt->hair_artist }}</td>
        <td>{{ $appt->date }}</td>
        <td>{{ $appt->time }}</td>
        <td>{{ $appt->price }}</td>
        <td>{{ $appt->store }}</td>
        <td>
            <form action="{{ route('appointment.destroy',$appt->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('appointment.show',$appt->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('appointment.edit',$appt->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
