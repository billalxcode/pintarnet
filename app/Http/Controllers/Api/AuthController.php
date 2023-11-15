<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ResponseError;
use App\Exceptions\ResponseSuccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest) {
        $credentials = $loginRequest->validated();

        $logged = Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $credentials['remember']);
        if (!$logged) {
            throw new ResponseError("incorrect email or password");
        }

        $token = $loginRequest->user()->createToken('api');
        throw new ResponseSuccess('successfully login', ['access_token' => $token->accessToken, 'expires_at' => $token->token->expires_at]);
    }
}
