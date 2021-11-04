@extends('layouts.app')

@section('content')


<div class="container mt-5">

<table class="table table-danger mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Pokemon</th>
            </tr>
        </thead>
        <tbody>

            @foreach (\App\Models\Friendship::where('accepted_at', null)->where('addressee_id',\Auth::user()->id)->get() as $friend)
            <tr>
                <th>{{$friend->requester->first_name}} {{$friend->requester->last_name}}</th>
                <th>{{$friend->requester->pokemon->name}}</th>
                <th><a>Accepter</a> / <a>Refuser</a></th>
            </tr>
            @endforeach
        </tbody>
    
    </table>


    <table class="table table-secondary mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Ami depuis ...</th>
            </tr>
        </thead>
        <tbody>
            @foreach (\App\Models\Friendship::where('requester_id',\Auth::user()->id)->orWhere('addressee_id',\Auth::user()->id)->get() as $friend)
            @if ($friend->requester_id==\Auth::user()->id)
            <tr>
                <th>{{$friend->addressee->first_name}} {{$friend->addressee->last_name}}</th>
                <th>{{$friend->accepted_at}}</th>
            </tr>

            @else
            <tr>
                <th>{{$friend->requester->first_name}} {{$friend->requester->last_name}}</th>
                <th>{{$friend->accepted_at}}</th>
            </tr>
            @endif
            
            @endforeach
        </tbody>
    
    </table>

@endsection