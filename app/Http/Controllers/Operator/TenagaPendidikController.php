<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImportTenagaPendidikRequest;
use App\Models\TenagaPendidik;
use App\Http\Requests\StoreTenagaPendidikRequest;
use App\Http\Requests\UpdateTenagaPendidikRequest;
use App\Imports\TenagaPendidikImport;
use App\Models\MataPelajaran;
use Maatwebsite\Excel\Facades\Excel;

class TenagaPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_tenaga_pendidik = TenagaPendidik::all();
        $data_mapels = MataPelajaran::all();
        return view('operator.tenaga-pendidik.home', [
            'data_tenaga_pendidik' => $data_tenaga_pendidik,
            'mapels' => $data_mapels
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
    public function store(StoreTenagaPendidikRequest $request)
    {
        $validated = $request->validated();

        TenagaPendidik::createTenagaPendidik(
            $validated['nip'],
            $validated['nama'],
            $validated['jk'],
            $validated['alamat'],
            $validated['tempat_lahir'],
            $validated['tanggal_lahir'],
            $validated['mapel_id']
        );
        
        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TenagaPendidik $tenagaPendidik)
    {
        //
    }

    /**
     * Import data
     */
    public function import(StoreImportTenagaPendidikRequest $storeImportTenagaPendidikRequest) {
        $storeImportTenagaPendidikRequest->validated();

        Excel::import(new TenagaPendidikImport, $storeImportTenagaPendidikRequest->file('file'));
        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TenagaPendidik $tenagaPendidik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenagaPendidikRequest $request, TenagaPendidik $tenagaPendidik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dataId)
    {
        $record = TenagaPendidik::where('id', $dataId);

        if ($record->exists()) {
            $record->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'data gagal dihapus. id tidak ditemukan');
        }
    }
}
