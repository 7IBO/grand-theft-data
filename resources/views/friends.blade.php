@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <table class="table table-danger mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pokemon</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach (\App\Models\Friendship::where('accepted_at', null)->where('addressee_id',\Auth::user()->id)->get() as $friend)
                    <tr>
                        <th>{{$friend->requester->first_name}} {{$friend->requester->last_name}}</th>
                        <th>{{$friend->requester->pokemon ? $friend->requester->pokemon->name :''}}</th>
                        <th><a href="{{route('add-friend',['id' => $friend->id, 'accepted' => 1])}}">Accepter</a> / <a href="{{route('add-friend',['id' => $friend->id, 'accepted' => 0])}}">Refuser</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-secondary mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pokemon</th>
                    <th>Ami depuis ...</th>
                </tr>
            </thead>
            <tbody>
                @php

                    $friends = \App\Models\Friendship::whereNotNull('accepted_at')->where(function($query) {
                        $query->where('requester_id',\Auth::user()->id)->orWhere('addressee_id',\Auth::user()->id);
                    })->get();

                @endphp

                @foreach ($friends as $friend)

                    @if ($friend->requester_id==\Auth::user()->id)
                        <tr>
                            <th>{{$friend->addressee->first_name}} {{$friend->addressee->last_name}}</th>
                            <th>{{$friend->addressee->pokemon ? $friend->addressee->pokemon->name :''}}</th>
                            <th>{{$friend->accepted_at}}</th>
                        </tr>
                    @else
                        <tr>
                            <th>{{$friend->requester->first_name}} {{$friend->requester->last_name}}</th>
                            <th>{{$friend->requester->pokemon ? $friend->requester->pokemon->name :''}}</th>
                            <th>{{$friend->accepted_at}}</th>
                        </tr>
                    @endif

                @endforeach
            </tbody>
        </table>

        <form method="post" action="">
            @csrf
            <label>Demander par email :</label>
            <div class="d-flex">
                <input type="email" name="email" placeholder="Entrer un email" class="form-control"/>
                <input type="submit" class="btn btn-success col-3 ms-5" value="Inviter"/>
            </div>
        </form>
    </div>
    
@endsection