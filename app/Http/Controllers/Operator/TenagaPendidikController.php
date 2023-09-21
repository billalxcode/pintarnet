<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\TenagaPendidik;
use App\Http\Requests\StoreTenagaPendidikRequest;
use App\Http\Requests\UpdateTenagaPendidikRequest;

class TenagaPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_tenaga_pendidik = TenagaPendidik::all();

        return view('operator.tenaga-pendidik.home', [
            'data_tenaga_pendidik' => $data_tenaga_pendidik
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

        TenagaPendidik::create($validated);

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
