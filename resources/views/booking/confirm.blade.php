@extends('layouts.app')

@section('content')
<h1>halo</h1>
<ul class="list-group">
    @foreach ($booking as $book)
        <li class="list-group-item">
        <h4>{{ $book->name_customer }}</h4>
        <p>{{ $book->email }}</p>
        <p>{{ $book->time }}</p>
        <p>{{ $book->date }}</p>
        <p>{{ $book->name_hair_artis }}</p>
        <p>{{ $book->price }}</p>

     </li>
    @endforeach
</ul>
@endsection

