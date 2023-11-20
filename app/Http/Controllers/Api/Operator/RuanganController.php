<?php

namespace App\Http\Controllers\Api\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRuanganRequest;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::all();
        
        return response()->json([
            'data' => $ruangans
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
        
        $ruangan = Ruangan::createRuangan($validated['nama'], $validated['keterangan']);

        return response()->json([
            'data' => $ruangan
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        return response()->json([
            'data' => $ruangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        if ($ruangan->exists()) {
            $ruangan->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'message' => 'Data gagal dihapus'
            ])->setStatusCode(404);
        }
    }
}
