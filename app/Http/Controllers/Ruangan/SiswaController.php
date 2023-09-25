<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $ruangan_id = auth()->user()->ruangan->id;
        $siswas = Siswa::where('ruangan_id', $ruangan_id)->get();
        
        return view('ruangan.siswa.home', [
            'siswa' => $siswas
        ]);
    }
}
