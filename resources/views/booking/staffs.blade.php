@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if ($staff->count() > 0)
    @foreach ($staff as $a)
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <img src="/asset/Bangun.jpg" class="rounded float-start" alt="...">
          <h5 class="card-title">{{ $a->name }}</h5>
          <p class="card-text">{{ $a->price }}</p>
          <p class="card-text">{{ $a->id }}</p>

          <form method="POST" action="{{ route('booking.store', $a->id) }}">
            @csrf
            <input type="hidden" name="staff_id" value="{{ $a->id }}">
            <button type="submit" class="btn btn-primary">Book</button>
          </form>

          <a class="btn btn-primary" href="/ProfileStaff/({{$a->id }})" role="button">View Profile</a>
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
@endsection