<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use App\Http\Requests\StoreStorageRequest;
use App\Http\Requests\UpdateStorageRequest;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_storage = Storage::all();

        return view('operator.storage.home', [
            'data_storage' => $data_storage
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
    public function store(StoreStorageRequest $request)
    {
        $request->validated();
        $file = $request->file('file');
        $type = $request->post("type");
        $path = '';
        if ($type == "photo") {
            $path = FacadesStorage::disk('public')->put('photossb', $file);  
        } else {
            $path = FacadesStorage::disk('public')->put('documents', $file);
        }
        Storage::create([
            'name' => $request->name,
            'path' => $path,
            'status' => $request->status,
            'type' => $type
        ]);

        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Storage $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Storage $storage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorageRequest $request, Storage $storage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Storage $storage)
    {
        //
    }
}
