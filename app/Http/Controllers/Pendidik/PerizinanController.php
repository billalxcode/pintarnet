<?php

namespace App\Http\Controllers\Pendidik;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pendidik\UpdatePerizinanRequest;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerizinanController extends Controller
{
    public function index() {
        $data_request_izin = Perizinan::status('meminta')->pendidik(Auth::user()->pendidik->id)->get();
    
        return view('pendidik.perizinan.home', [
            'data_request_izin' => $data_request_izin
        ]);
    }

    public function update(UpdatePerizinanRequest $request) {
        $validated = $request->validated();

        $data = Perizinan::findOrFail($validated['id']);
        if ($data->exists()) {
            $data->status = $validated['status'];
            $data->update();

            return redirect()->back()->with('success', 'siswa ' . $data->siswa->nama . ' ' . $validated['status'] . ' untuk ' . $data->jenis);
        } else {
            return redirect()->back()->with('error', 'data perizinan tidak ditemukan');
        }
    }
}
