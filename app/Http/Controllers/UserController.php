<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request) {
        $user = new \App\Models\User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->genre;
        $user->pokemon_id = $request->pokemon;

        $user->save();
    }

    public function login(Request $request) {
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                \Auth::loginUsingId($user->id);
                return \Auth::user();
            } else {
                return 'test false';
            }
        } else {
            return 'test false 2';
        }
    }
}
