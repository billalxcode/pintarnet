<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImportTenagaKependidikanRequest;
use App\Models\TenagaKependidikan;
use App\Http\Requests\StoreTenagaKependidikanRequest;
use App\Http\Requests\UpdateTenagaKependidikanRequest;
use App\Imports\TenagaKependidikanImport;
use Maatwebsite\Excel\Facades\Excel;

class TenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_tenaga_kependidikan = TenagaKependidikan::all();

        return view('operator.tenaga-kependidikan.home', [
            'data_tenaga_kependidikan' => $data_tenaga_kependidikan
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
    public function store(StoreTenagaKependidikanRequest $request)
    {
        $validated = $request->validated();

        TenagaKependidikan::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TenagaKependidikan $tenagaKependidikan)
    {
        //
    }

    /**
     * Import data
     */
    public function import(StoreImportTenagaKependidikanRequest $request) {
        $request->validated();

        Excel::import(new TenagaKependidikanImport, $request->file('file'));

        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TenagaKependidikan $tenagaKependidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenagaKependidikanRequest $request, TenagaKependidikan $tenagaKependidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dataId)
    {
        $record = TenagaKependidikan::where('id', $dataId);

        if ($record->exists()) {
            $record->delete();

            return redirect()->back()->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'data gagal dihapus, id tidak ditemukan');
        }
    }
}
