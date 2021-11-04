@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span>{{$post->author->first_name}} {{$post->author->last_name}}</span>
                    <span class="text-secondary">{{$post->created_at}}</span>
                </div>
                
            </div>
            <div class="card-body d-flex justify-content-between">
                {{$post->description}}
            </div>
        </div>

        <div class="d-flex align-items-end flex-column">
            @foreach($post->comments as $comment)
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

            <form method="POST" action="{{route('comment.create')}}" class="col-4 mt-2">
                @csrf
                <textarea name="comment" class="form-control" placeholder="Qu'avez vous à dire ? "></textarea>
                <div class="d-flex justify-content-end mt-2">
                    <input type="hidden" value="{{$post->id}}" name="postid"/>
                    <input type="submit" value="Poster" class="btn btn-success mb-4 w-100"/>
                </div>
            </form>
        </div>
    </div>
@endsection