@extends('layouts.app')

@section('content')

    <div class="container mt-3">

        <a class="btn btn-success" href="{{route('post.create')}}">    
        créer un post
        </a>
        @foreach($posts as $post)
        <div class="card">
            <div class="card-header">
                {{$post->author->first_name}} {{$post->author->last_name}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>{{$post->description}}</p>
                
            </div>
            <div class="card-footer text-muted text-end">
                {{$post->created_at}}
            </div>
        </div>
        @endforeach
    </div>

@endsection