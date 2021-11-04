@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <form method="POST" action="{{route('post.create')}}" class="border-bottom">
            @csrf
            <label for="post_create" class="mb-3">Ajouter un post</label>
            <textarea name="description" class="form-control" id="post_create" placeholder="Qu'avez vous à dire ?" required></textarea>
            <div class="d-flex justify-content-end mt-2">
                <input type="submit" value="Poster" class="btn btn-success mb-4 col-2"/>
            </div>
        </form>

        <h4 class="mt-5">Mon fil d'actualité</h4>
        
        @foreach($posts as $post)
            <div class="card mt-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>{{$post->author->first_name}} {{$post->author->last_name}}</span>
                        <span class="text-secondary">{{$post->created_at}}</span>
                    </div>
                    
                </div>
                <div class="card-body d-flex justify-content-between">
                    {{$post->description}}
                    <a href="{{ route('posts.show', $post->id) }}">Accéder au post</a>
                </div>
            </div>

            @if (count($post->comments) > 0)
                <div class="d-flex align-items-end flex-column">
                    <div class="col-5 mt-2">
                        <div class="card">
                            <div class="card-body">
                                @foreach($post->comments->slice(0, 2) as $comment)
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            <b>{{$comment->author->first_name}} {{$comment->author->last_name}} :</b>
                                            {{$comment->content}}
                                        </span>
                                        <span class="text-secondary">{{$comment->created_at}}</span>
                                    </div>
                                @endforeach
                                @if (count($post->comments) > 2)
                                    <b>...</b>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="d-flex align-items-end flex-column">
                <form method="POST" action="{{route('comment.create')}}" class="col-5 mt-2">
                    @csrf
                    <input type="hidden" value="{{$post->id}}" name="postid"/>
                    <div class="d-flex justify-content-between">
                        <input type="text" name="comment" class="form-control" placeholder="Qu'avez vous à dire ?" required style="width: 62.5%"/>
                        <input type="submit" value="Poster" class="btn btn-success col-3"/>
                    </div>
                </form>
            </div>
        @endforeach
    </div>

@endsection