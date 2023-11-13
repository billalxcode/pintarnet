<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use App\Http\Requests\StoreRuanganRequest;
use App\Http\Requests\UpdateRuanganRequest;
use App\Models\Kehadiran;
use App\Models\Siswa;
use App\Models\TenagaPendidik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_id = $request->query('id');

        $data_ruangan = Ruangan::all();
        if (!is_null($query_id)) {
            $data_ruangan = $data_ruangan->filter(function ($data) use ($query_id) {
                return $data->id == $query_id;
            });
        }
        $data_users = User::role('ruangan')->get();
        $data_tenagapendidiks = TenagaPendidik::whereNotIn('id', $data_ruangan->map(function($data) {
            return $data->wali_id;
        }))->get()->sortBy('nama');

        return view('operator.ruangan.home', [
            'data_ruangan' => $data_ruangan,
            'data_users' => $data_users,
            'pendidiks' => $data_tenagapendidiks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRuanganRequest $request)
    {
        $validated = $request->validated();

        Ruangan::create($validated);

        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($ruangan_id)
    {
        $ruangan = Ruangan::find($ruangan_id);
        $kehadiran = [];
        $kehadiran['jumlah_sakit'] = Kehadiran::ruanganx($ruangan->id)->sakit()->count();
        $kehadiran['jumlah_izin'] = Kehadiran::ruanganx($ruangan->id)->izin()->count();
        $kehadiran['jumlah_alpha'] = Kehadiran::ruanganx($ruangan->id)->alpha()->count();
        $kehadiran['jumlah_bolos'] = Kehadiran::ruanganx($ruangan->id)->bolos()->count();

        $siswa = Siswa::ruanganx($ruangan->id)->get();

        $ruangan->setAttribute('kehadiran', (object) $kehadiran);
        $ruangan->setAttribute('siswas', (object) $siswa);

        return view('operator.ruangan.detail', [
            'ruanganx' => $ruangan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRuanganRequest $request, Ruangan $ruangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ruangan_id)
    {
        $record = Ruangan::where('id', $ruangan_id);

        if ($record->exists()) {
            $record->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'data gagal dihapus, id tidak ditemukan');
        }
    }
}
