<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserImportRequest;
use App\Http\Requests\StoreUserRequest;
use App\Imports\MasterImport;
use App\Imports\UserRuanganImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request) {
        $_email = $request->query('email');
        $data_users = User::all()->except(Auth::user()->id);
        $data_users->map(function($data) {
            $roles = $data->getRoleNames();
            $role = collect($roles)->implode(",");
            $data->setAttribute('role', $role);
            return $data;
        });
        $data_users = $data_users->filter(function($data) use ($_email) {
            return $data->email == $_email;
        });
        $data_roles = Role::all();

        return view('operator.user.home', [
            'data_users' => $data_users,
            'data_roles' => $data_roles
        ]);
    }

    public function store(StoreUserRequest $storeUserRequest) {
        $validated = $storeUserRequest->validated();

        $user = User::create($validated);
        $user->assignRole($validated['role']);

        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    public function destroy($user_id) {
        $record = User::where('id', $user_id)->get()->except(Auth::user()->id);
        $recordQuery = $record->toQuery();
        if ($recordQuery->exists()) {
            $recordQuery->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'data gagal dihapus');
        }
    }
}
