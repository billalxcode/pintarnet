<?php

namespace App\Http\Controllers\Api\Ruangan;

use App\Exceptions\AlreadyPresent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKehadiranAbsenRequest;
use App\Http\Requests\StoreKehadiranRequest;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KehadiranController extends Controller
{
    protected $user;
    protected $ruangan;

    protected function getUser() {
        $this->user = auth()->user();
        $this->ruangan = $this->user->ruangan;
    }

    public function index() {
        $this->getUser();

        $kehadirans = Kehadiran::ruanganx($this->ruangan->id ?? 0)->get();

        return response()->json([
            'data' => $kehadirans
        ]);
    }

    public function absen(StoreKehadiranAbsenRequest $request) {
        $validated = $request->validated();

        if (in_array('file', $validated)) {
            $file = $request->file('file');
            $storage_path = Storage::disk('public')->put('absensi/' . Carbon::now()->toFormattedDayDateString(), $file);
        }

        try {
            Kehadiran::createKehadiran($request->siswa_id, $request->status, $request->ruangan_id, $storage_path ?? null, $request->keterangan, $request->mapel);
            return response()->json([
                'message' => 'siswa berhasil diabsen'
            ]);
        } catch (AlreadyPresent $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 403);
        }
    }
}
