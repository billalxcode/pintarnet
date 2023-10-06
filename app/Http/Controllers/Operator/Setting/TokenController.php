<?php

namespace App\Http\Controllers\Operator\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function index(Request $request) {
        $tokens = $request->user()->tokens()->get();

        return view('operator.setting.token', [
            'tokens' => $tokens
        ]);
    }

    public function store() {

    }

    public function destroy() {

    }
}
