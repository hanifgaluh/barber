@extends('layouts.app')

@section('content')
<h1>Staff Schedules</h1>

<a href="#" class="btn btn-primary mb-3">Create New Schedule</a>

<table class="table">
    <thead>
        <tr>
            <th>Staff</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staffSchedules as $staffSchedule)
        <tr>
            <td>{{ $staffSchedule->staff->name }}</td>
            <td>{{ $staffSchedule->start_time }}</td>
            <td>{{ $staffSchedule->end_time }}</td>
            <td>
                <a href="{{ route('staff-schedule.show', $staffSchedule->id) }}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('staff-schedule.edit', $staffSchedule->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('staff-schedule.destroy', $staffSchedule->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection