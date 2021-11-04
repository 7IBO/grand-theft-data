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

    public function add(Request $request) {
        if (Friendship::find($request->id)){
            $friend = Friendship::find($request->id);
            if ($request->accepted == 1) {
                $friend->accepted_at=\Carbon\Carbon::now();
                $friend->save();

            }
            else{
                $friend->delete();
            }
        }


        return redirect()->back();
    }
}
