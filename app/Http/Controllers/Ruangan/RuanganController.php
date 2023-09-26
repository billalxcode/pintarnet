<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        $kehadiran_collection = Kehadiran::latest()->take(50)->orderBy('created_at', 'DESC')->get();
        
        return view('ruangan.home');
    }
}
