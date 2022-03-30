<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'section' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($request['email'] === ENV('EMAIL_ADMIN') && $request['password'] === ENV('PASS_ADMIN')) {
            return redirect()->intended('/dashboard');
        };

        return back()->with('loginError', 'Login Failed');

        $request->session()->flash('failed', 'Login Failed!');


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
