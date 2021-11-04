<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderByDesc('created_at')->get();

        return view('posts.posts',compact('posts'));
    }

    public function create(Request $request){
        $post=new \App\Models\Post();
        $post->description = $request->description;
        $post->author_id = \Auth::user()->id;

        $post->save();
        return redirect()->back();
    }

    public function show(int $id) {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
