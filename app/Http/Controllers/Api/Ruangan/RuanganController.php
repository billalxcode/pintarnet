<?php

namespace App\Http\Controllers\Api\Ruangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        $user = auth()->user();
        $ruangan = $user->ruangan;
        
        return response()->json([
            'data' => $ruangan
        ]);
    }
}
