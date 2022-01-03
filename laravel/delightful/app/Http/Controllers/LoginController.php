<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/place-order');
        }
        
        return back()->with('error', 'Email or password not correct' );
    }


    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function test() {
        return "test";
    }
}
