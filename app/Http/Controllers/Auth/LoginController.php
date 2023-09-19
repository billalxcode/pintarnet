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

        $logged = Auth::attempt($credentials);
        if ($logged) {
            $loginRequest->session()->regenerate();
            return redirect()->route('operator.home');
        } else {
            return redirect()->back()->with('error', 'incorrect email or password');
        }
    }
}
