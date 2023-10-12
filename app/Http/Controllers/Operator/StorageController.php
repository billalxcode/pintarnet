<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use App\Http\Requests\StoreStorageRequest;
use App\Http\Requests\UpdateStorageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
            $path = FacadesStorage::disk('public')->put('photo', $file);
        } else {
            $path = FacadesStorage::disk('public')->put('documents', $file);
        }
        Storage::create([
            'name' => $request->name,
            'path' => $path,
            'status' => $request->status,
            'filename' => $file->getClientOriginalName(),
            'type' => $type
        ]);

        return redirect()->back()->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $storage_id = $request->post('storage_id');
        $storage_data = Storage::find($storage_id);
        if ($storage_data->exists()) {
            $exists_storage = FacadesStorage::disk('public')->exists($storage_data->path);
            if ($exists_storage) {
                $storage_path = storage_path('app/public/' . $storage_data->path);

                $file = File::get($storage_path);
                $type = File::mimeType($storage_path);

                $response = Response::make($file, 201);
                $response->header('Content-Type', $type);
                $response->header('Content-disposition', 'attachment; filename=' . $storage_data->filename);
                return $response;
            } else {
                return redirect()->back()->with('error', 'file tidak ditemukan, mungkin file corrupt atau terhapus.');
            }
        } else {
            return redirect()->back()->with('error', 'data tidak ditemukan');
        }
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
    public function destroy($storage_id)
    {
        $record = Storage::findOrFail($storage_id);
        if ($record->exists()) {
            $filename = $record->path;
            $exists = FacadesStorage::disk('public')->exists($filename);
            if ($exists) {
                FacadesStorage::disk('public')->delete($filename);
            }
            $record->delete();
            return redirect()->back()->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'data gagal dihapus, id tidak ditemukan');
        }
    }
}
