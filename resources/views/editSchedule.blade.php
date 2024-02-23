@extends('layouts.app')

@section('content')
<h1>Edit Staff Schedule</h1>

<form action="{{ route('staff-schedule.update', $staffSchedule->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="staff_id">Staff</label>
        <select name="staff_id" id="staff_id" class="form-control">
            @foreach($staff as $s)
            <option value="{{ $s->id }}" {{ $s->id == $staffSchedule->staff_id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $staffSchedule->start_time }}" required>
    </div>

    <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $staffSchedule->end_time }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection