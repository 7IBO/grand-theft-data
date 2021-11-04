<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('posts.posts',compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }
}
