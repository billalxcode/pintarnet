<?php

namespace App\Http\Controllers\Api\Operator;

use App\Exceptions\ResponseError;
use App\Exceptions\ResponseSuccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRuanganRequest;
use App\Models\Ruangan;
use App\Models\User;
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

    public function assign(Request $request, $ruangan_id) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);
        $record = Ruangan::findOrFail($ruangan_id);
        if ($record->exists()) {
            $record->user_id = $request->user_id;
            $record->update();
            $ruangan_data_new = Ruangan::findOrFail($ruangan_id);

            throw new ResponseSuccess('success to assign user', $ruangan_data_new);
        } else {
            throw new ResponseError('ruangan not found', 404);
        }
    }
}
