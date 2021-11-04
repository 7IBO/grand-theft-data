<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    function create(Request $request){
        $comment=new \App\Models\Comment();
        $comment->content = $request->comment;
        $comment->author_id = \Auth::user()->id;
        $comment->post_id = $request->postid;

        $comment->save();
        return redirect()->back();
    }
}
