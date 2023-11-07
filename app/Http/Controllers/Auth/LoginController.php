<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function check(LoginRequest $loginRequest) {
        $credentials = $loginRequest->validated();

        $logged = Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], ($credentials['remember'] == 'on' ? true : false));
        if ($logged) {
            $loginRequest->session()->regenerate();
            return redirect()->route('auth.redirect');
        } else {
            return redirect()->back()->with('error', 'incorrect email or password');
        }
    }

    public function logout() {
        Auth::logout();

        session()->regenerate();

        return redirect()->route('auth.login.home');
    }
}
