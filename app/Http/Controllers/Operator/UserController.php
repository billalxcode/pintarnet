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
