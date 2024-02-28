@extends('layouts.app')

@section('content')
<h1>Create Staff Schedule</h1>

<form action="{{ route('staff-schedule.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="staff_id">Staff</label>
        <select name="staff_id" id="staff_id" class="form-control">
            @foreach($staff as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" name="start_time" id="start_time" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="time" name="end_time" id="end_time" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection