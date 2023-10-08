<?php

namespace App\Http\Controllers\Api\Operator;

use App\Exceptions\ResponseSuccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $data_users = User::all()->except(Auth::user()->id);
        $data_users->map(function ($data) {
            $roles = $data->getRoleNames();
            $role = collect($roles)->implode(",");
            $data->setAttribute('role', $role);
            return $data;
        });

        throw new ResponseSuccess('success get all users', $data_users);
    }

    public function store(StoreUserRequest $request) {
        $data = $request->validated();
        $user = User::create($data);
        dd($user);
        $user->assignRole('ruangan');

        throw new ResponseSuccess('success create new data', $user);
    }
}
