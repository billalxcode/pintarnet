<?php

namespace App\Http\Controllers\Pendidik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikController extends Controller
{
    public function index() {
        return view('pendidik.home');
    }
}
