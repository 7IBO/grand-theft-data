<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function verify(Request $request) {
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                \Auth::loginUsingId($user->id);
                return redirect()->route('index');
            } else {
                return redirect()->back()->with('error', 'Email et/ou mot de passe incorrect !');
            }
        } else {
            return redirect()->back()->with('error', 'Email et/ou mot de passe incorrect !');
        }
    }
}
