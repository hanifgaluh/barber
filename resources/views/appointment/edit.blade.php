@extends('appointment.layout')

@section('content')
<h2>Edit Appointment</h2>

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

<form action="{{ route('appointment.update', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Form fields same as create.blade.php, but with value attribute filled with $appointment data -->
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
