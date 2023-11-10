<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    protected $weekMap = [
        "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"
    ];

    public function index() {
        $time_format_today = Carbon::today()->isoFormat('dddd, D MMMM Y');
        $kehadiran_collection = Kehadiran::latest()->take(50)->orderBy('created_at', 'DESC')->get();

        return view('ruangan.home', [
            'time_format_day' => $time_format_today
        ]);
    }
}
