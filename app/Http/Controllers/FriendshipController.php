<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friendship;

class FriendshipController extends Controller
{
    public function index() {
        $friends = Friendship::where('requester_id',\Auth::user()->id)->orWhere('addressee_id',\Auth::user()->id)->get();
        return view('friends', compact('friends'));
    }
}
