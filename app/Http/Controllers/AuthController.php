<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    function showFormLogin()
{
    return view('auth/login');
}

function login(Request $request) {
    $email = $request->email;
    $credentials = $request->validate([
        // 'email' => ['required', 'email'],
        'email' => 'required|email',
        'password' => ['required'],
    ]);
   

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        session()->put('userEmail', $email);
        return redirect()->route('students.index');
        // return view('index');
    }
    session()->flash('error', 'Account not exist!');
    return back();
}

 public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}