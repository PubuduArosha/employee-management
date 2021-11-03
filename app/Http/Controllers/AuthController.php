<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ✳ Load login page 
    public function login()
    {
        return view('auth.login');
    }

    // ✳ User login function
    public function auth_login(Request $request)
    {
        // validate request
        $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        // accept only email and password value
        $credentials = $request->only('email', 'password');

        // attempt to login
        if (Auth::attempt($credentials)) {

            // generate a login session
            $request->session()->regenerate();
            // after successfully login redirect to the dashboard route
            return redirect()->intended('dashboard');
        }

        // if there any login related issues return back with the error messages
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // ✳ User logout function
    public function logout()
    {
        // logout auth session
        Auth::logout();
        // redirect after successfully logout to login route
        return redirect(route('login'));
    }

    //  ✳ Load dashboard page
    public function dashboard()
    {
        return view('dashboard');
    }
}
