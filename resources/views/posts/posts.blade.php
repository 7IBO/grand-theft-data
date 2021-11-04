@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="d-flex justify-content-end">
            <a class="btn btn-success mb-4" href="{{route('post.create')}}">    
                Créer un post
            </a>
        </div>
        
        @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>{{$post->author->first_name}} {{$post->author->last_name}}</span>
                        <span class="text-secondary">{{$post->created_at}}</span>
                    </div>
                    
                </div>
                <div class="card-body">
                    {{$post->description}}
                </div>
            </div>

            <div class="d-flex justify-content-end">
                @foreach($post->comments->slice(0, 3) as $comment)
                    <div class="col-5 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <span>Commentaire de {{$comment->author->first_name}} {{$comment->author->last_name}}</span>
                                    <span class="text-secondary">{{$comment->created_at}}</span>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                {{$comment->content}}
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (count($post->comments) > 3)
                    <span>...</span>
                @endif
            </div>
        @endforeach
    </div>

@endsection