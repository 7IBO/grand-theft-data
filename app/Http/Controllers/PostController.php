<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\Friendship;

class PostController extends Controller
{
    public function index(){
        $posts = Post::whereIn('author_id', function($query) {
            $query->select('addressee_id')->from('friendships')->where('requester_id', \Auth::user()->id)->whereNotNull('accepted_at');
        })->orWhereIn('author_id', function($query) {
            $query->select('requester_id')->from('friendships')->where('addressee_id', \Auth::user()->id)->whereNotNull('accepted_at');
        })->orWhere('author_id', \Auth::user()->id)->orderByDesc('created_at')->get();
        
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
