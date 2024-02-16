@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $staff->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/photos/'.$staff->photo) }}" alt="{{ $staff->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h5>Description:</h5>
                            <p>{{ $staff->description }}</p>
                            <h5>Price:</h5>
                            <p>{{ $staff->price }}</p>
                            <h5>Location:</h5>
                            <p>{{ $staff->loc_store }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection