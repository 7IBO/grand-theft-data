@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        @foreach ($friends as $friend)
            {{$friend}}
        @endforeach
    </div>

@endsection