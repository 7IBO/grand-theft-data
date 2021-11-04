@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <form method="POST" action="{{route('post.create')}}">
            @csrf
            <textarea name="description" class="form-control" placeholder="Qu'avez vous à dire ? "></textarea>
            <div class="d-flex justify-content-end mt-2">
                <input type="submit" value="Poster" class="btn btn-success mb-4 col-2"/>
            </div>
        </form>
        
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

            <div class="d-flex align-items-end flex-column">
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
                <form method="POST" action="{{route('comment.create')}}" class="col-4 mt-2">
                    @csrf
                    <textarea name="comment" class="form-control" placeholder="Qu'avez vous à dire ? "></textarea>
                    <div class="d-flex justify-content-end mt-2">
                        <input type="hidden" value="{{$post->id}}" name="postid"/>
                        <input type="submit" value="Poster" class="btn btn-success mb-4 w-100"/>
                    </div>
                </form>
            </div>
        @endforeach
    </div>

@endsection