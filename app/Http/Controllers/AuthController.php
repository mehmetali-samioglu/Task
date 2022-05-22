<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
            $user = auth()->user();
            $user['last_login'] = Carbon::now();
            $user->save();
            return redirect()->route('dashboard.index');
        }

        return view('login')->with('message',__('general.login_alert'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
