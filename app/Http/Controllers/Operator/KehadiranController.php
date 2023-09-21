<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;
use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_kehadirans = Kehadiran::whereDate('created_at', Carbon::today('Asia/Jakarta'))->get();
        
        return view('operator.kehadiran.home', [
            'data_kehadiran' => $data_kehadirans
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
    public function store(StoreKehadiranRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKehadiranRequest $request, $kehadiran_id)
    {
        $validated = $request->validated();

        $record = Kehadiran::where('id', $kehadiran_id);

        if ($record->exists()) {
            $record->update($validated);

            return redirect()->back()->with('success', 'data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'data gagal diupdate, id tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kehadiran $kehadiran)
    {
        //
    }
}
