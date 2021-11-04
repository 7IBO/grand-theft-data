<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friendship;
use App\Models\User;

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

    public function store(Request $request) {
        if ($request->input('email') && User::where('email', $request->input('email'))->first()) {
            $requesterId = \Auth::user()->id;
            $addresseeId = User::where('email', $request->input('email'))->first()->id;

            $friendship = new Friendship();
            $friendship->requester_id = $requesterId;
            $friendship->addressee_id = $addresseeId;
            $friendship->save();

            return redirect()->back();
        }
    }
}
