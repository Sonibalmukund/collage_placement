<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class loginController extends Controller
{
    //
    public function create(){

        return view('auth.login');
    }


    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // Attempt to authenticate the user
        // dd($credentials);

        $credentials = $request->only('email', 'password');
    if (Auth::guard('student')->attempt($credentials)) {
        return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
{
    Auth::guard('student')->logout(); // Logout the user


    return redirect()->route('login');
}
}
