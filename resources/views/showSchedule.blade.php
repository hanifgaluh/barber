@extends('layouts.app')

@section('content')
<h1>Staff Schedule</h1>

<p><strong>Staff:</strong> {{ $staffSchedule->staff->name }}</p>
<p><strong>Start Time:</strong> {{ $staffSchedule->start_time }}</p>
<p><strong>End Time:</strong> {{ $staffSchedule->end_time }}</p>

<a href="{{ route('staff-schedule.edit', $staffSchedule->id) }}" class="btn btn-primary">Edit</a>
<a href="/dashboard/appointment" class="btn btn-secondary">Back to List</a>
@endsection