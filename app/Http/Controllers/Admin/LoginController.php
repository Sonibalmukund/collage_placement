<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function create(){
        return view('auth.adminlogin');
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
    if (Auth::guard('web')->attempt($credentials)) {
        return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
{
    Auth::guard('web')->logout(); // Logout the user
    return redirect()->route('admin.login'); // Redirect to login page
}
}
