<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerizinanRequest;
use App\Models\Perizinan;
use App\Models\Siswa;
use App\Models\TenagaKependidikan;
use App\Models\TenagaPendidik;
use App\Notifications\RequestPerizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PerizinanController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data_perizinan_masuk = Perizinan::where('ruangan_id', $user->ruangan->id)->orWhere('jenis', 'masuk')->get();
        $data_perizinan_keluar = Perizinan::where('ruangan_id', $user->ruangan->id)->orWhere('jenis', 'keluar')->get();

        $data_siswas = Siswa::whereNotIn('id', $data_perizinan_keluar->map(function($data) {
            return $data['siswa_id'];
        }))->where('ruangan_id', $user->ruangan->id)->get()->sortBy('nama');
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
        $perizinan = Perizinan::create($validated);

        $notification_data = [
            'nama_siswa' => $perizinan->siswa->nama,
            'keterangan' => $perizinan->keterangan,
            'status' => $perizinan->status,
            'jenis' => $perizinan->jenis
        ];
        Notification::send($perizinan->guru->user, new RequestPerizinan($notification_data));

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}
