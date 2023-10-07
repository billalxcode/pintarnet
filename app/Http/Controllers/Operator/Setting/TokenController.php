<?php

namespace App\Http\Controllers\Operator\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class TokenController extends Controller
{
    public function index(Request $request) {
        $tokens = $request->user()->tokens()->get();

        return view('operator.setting.token', [
            'tokens' => $tokens
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);


        $request->user()->createToken($request->name);
        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    public function destroy($token) {
        $record = PersonalAccessToken::where('token', $token);

        if ($record->exists()) {
            $record->delete();

            return redirect()->back()->with('success', 'berhasil menghapus token');
        } else {
            return redirect()->back()->with('error', 'gagal menghapus token');
        }
    }
}
