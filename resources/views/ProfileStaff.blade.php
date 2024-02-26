@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if($staff)
                    <img src="{{ $staff->photo }}" alt="Foto Staf">
                    <h1>{{ $staff->name }}</h1>
                    <p>{{ $staff->description }}</p>                
                @else
                    <p>Staf tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
