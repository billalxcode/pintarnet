<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        return view('ruangan.home');
    }
}
