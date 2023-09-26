<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index() {
        $kehadiran_collection = Kehadiran::latest()->take(50)->orderBy('created_at', 'DESC')->get();
         
        return view('operator.home', [
            'last_data_kehadiran' => $kehadiran_collection
        ]);
    }
}
