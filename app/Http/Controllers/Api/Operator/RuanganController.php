<?php

namespace App\Http\Controllers\Api\Operator;

use App\Exceptions\ResponseSuccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRuanganRequest;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        $ruangans = Ruangan::all();

        throw new ResponseSuccess('success get all data', $ruangans);
    }

    public function store(StoreRuanganRequest $request) {
        $data = $request->validated();

        $ruangan = Ruangan::create($data);

        throw new ResponseSuccess('success create new data', $ruangan);
    }
}
