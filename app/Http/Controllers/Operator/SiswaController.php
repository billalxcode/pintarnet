<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Ruangan;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_siswa = Siswa::all();
        $data_ruangan = Ruangan::all();

        return view('operator.siswa.home', [
            'siswa' => $data_siswa,
            'data_ruangan' => $data_ruangan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operator.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        $validated = $request->validated();

        Siswa::create($validated);

        return redirect()->back()->with('success', 'data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($siswa_id)
    {
        $record = Siswa::where('id', $siswa_id);
        if ($record->exists()) {
            $record->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'data gagal dihapus. id tidak ditemukan');
        }
    }
}
