<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImportSiswaRequest;
use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Imports\SiswaImport;
use App\Models\Kehadiran;
use App\Models\Ruangan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
     * Import data from XLSX
     */

    public function import(StoreImportSiswaRequest $storeImportSiswaRequest) {
        $storeImportSiswaRequest->validated();
        Excel::import(new SiswaImport, $storeImportSiswaRequest->file('file'));

        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    /**
     * Download and convert template
     */
    public function convert(Request $request, $filetype) {
        $filetype = Str::lower($filetype);
        if (!Storage::exists('excel/MS.T-Master.xlsx')) {
            return redirect()->back()->with('error', 'maaf file tidak ditemukan. silahkan lapor jika ini merupakan bug');
        }
        $storage = Storage::path('excel/MS.T-Master.xlsx');

        if ($filetype == "xlsx") {
            return response()->download($storage, Str::lower(config('app.name')) . '-template.xlsx');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($siswa_id)
    {
        $siswa = Siswa::find($siswa_id);

        $kehadiran = [];

        $kehadiran['sakit'] = Kehadiran::siswax($siswa->id)->sakit()->get();
        $kehadiran['izin'] = Kehadiran::siswax($siswa->id)->izin()->get();
        $kehadiran['alpha'] = Kehadiran::siswax($siswa->id)->alpha()->get();
        $kehadiran['bolos'] = Kehadiran::siswax($siswa->id)->bolos()->get();

        $kehadiran['jumlah_sakit'] = Kehadiran::siswax($siswa->id)->sakit()->count();
        $kehadiran['jumlah_izin'] = Kehadiran::siswax($siswa->id)->izin()->count();
        $kehadiran['jumlah_alpha'] = Kehadiran::siswax($siswa->id)->alpha()->count();
        $kehadiran['jumlah_bolos'] = Kehadiran::siswax($siswa->id)->bolos()->count();

        $siswa->setAttribute('kehadiran', (object) $kehadiran);

        return view('operator.siswa.detail', [
            'siswa' => $siswa
        ]);
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
