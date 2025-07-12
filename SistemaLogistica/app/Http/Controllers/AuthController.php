<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('User.login');
    }

    public function LoginAuth(Request $request)
    {
        $credentials = $request->validate([
            'user' => 'required',
            'senha' => 'required'
        ]);

       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
       }
    }
}
