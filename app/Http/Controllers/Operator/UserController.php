<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $data_users = User::all()->except(Auth::user()->id);
        
        return view('operator.user.home', [
            'data_users' => $data_users
        ]);
    }
}
