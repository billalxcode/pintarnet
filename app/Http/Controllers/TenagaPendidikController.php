<?php

namespace App\Http\Controllers;

use App\Models\TenagaPendidik;
use Illuminate\Http\Request;

class TenagaPendidikController extends Controller
{
    public function index() {
        $tenaga_pendidiks = TenagaPendidik::all();

        return view('guest.tenaga-pendidik.home', [
            'data_tenaga_pendidik' => $tenaga_pendidiks
        ]);
    }
}
