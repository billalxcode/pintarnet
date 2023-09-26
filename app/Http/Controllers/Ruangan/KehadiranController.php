<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKehadiranAbsenRequest;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data_kehadiran = Kehadiran::where('ruangan_id', $user->ruangan->id)->get();
        return view('ruangan.kehadiran.home', [
            'data_kehadiran' => $data_kehadiran
        ]);
    }

    public function absen(StoreKehadiranAbsenRequest $requst) {
        
    }
}
