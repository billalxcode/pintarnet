<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerizinanRequest;
use App\Models\Perizinan;
use App\Models\Siswa;
use App\Models\TenagaKependidikan;
use App\Models\TenagaPendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerizinanController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data_perizinan_masuk = Perizinan::where('ruangan_id', $user->ruangan->id)->orWhere('jenis', 'masuk')->get();
        $data_perizinan_keluar = Perizinan::where('ruangan_id', $user->ruangan->id)->orWhere('jenis', 'keluar')->get();

        $data_siswas = Siswa::whereNotIn('id', $data_perizinan_keluar->map(function($data) {
            return $data['siswa_id'];
        }))->get()->sortBy('nama');
        $data_pendidiks = TenagaPendidik::all()->sortBy('nama');
        $data_kependidikans = TenagaKependidikan::all()->sortBy('nama');

        return view('ruangan.perizinan.home', [
            'data_masuk' => $data_perizinan_masuk,
            'data_keluar' => $data_perizinan_keluar,
            'data_siswas' => $data_siswas,
            'data_pendidiks' => $data_pendidiks,
            'data_kependidikans' => $data_kependidikans
        ]);
    }

    public function store(StorePerizinanRequest $storePerizinanRequest) {
        $validated = $storePerizinanRequest->validated();
        // dd($validated);
        Perizinan::create($validated);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}
