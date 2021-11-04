<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        return view('auth.register');
    }


    public function store(Request $request) {
        $user = new \App\Models\User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->genre;
        $user->pokemon_id = $request->pokemon;

        $user->save();

        \Auth::loginUsingId($user->id);

        return redirect()->route('index');
    }
}
