<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $data_siswa = Siswa::all();
        
        return view('guest.siswa.home', [
            'siswas' => $data_siswa
        ]);
    }
}
