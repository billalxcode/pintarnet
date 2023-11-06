<?php

namespace App\Http\Controllers\Ruangan;

use App\Exceptions\AlreadyPresent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKehadiranAbsenRequest;
use App\Models\Kehadiran;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KehadiranController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data_kehadiran = Kehadiran::where('ruangan_id', $user->ruangan->id)->whereDate('created_at', Carbon::today())->get();
        $siswa_absens = $data_kehadiran->collect()->map(function($data) {
            return $data->id;
        });
        $data_siswas = Siswa::where('ruangan_id', $user->ruangan->id)->whereNotIn('id', $siswa_absens)->orderBy('nama')->get();

        return view('ruangan.kehadiran.home', [
            'data_kehadiran' => $data_kehadiran,
            'data_siswas' => $data_siswas
        ]);
    }

    public function absen(StoreKehadiranAbsenRequest $request) {
        $validated = $request->validated();
        $file = $request->file('file');

        $storage_path = Storage::disk('public')->put('absensi/' . Carbon::now()->toFormattedDateString(), $file);

        try {
            Kehadiran::createKehadiran($request->siswa_id, $request->status, $request->ruangan_id, $storage_path, $request->keterangan);
            return redirect()->back()->with('success', 'siswa berhasil absen');
        } catch (AlreadyPresent $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
