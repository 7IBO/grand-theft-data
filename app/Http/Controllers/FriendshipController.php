<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendshipController extends Controller
{
    public function index() {
        $friends = \Auth::user()->friends;
        return view('friends', compact('friends'));
    }
}
