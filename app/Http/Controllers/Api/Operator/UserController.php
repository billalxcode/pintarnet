<?php

namespace App\Http\Controllers\Api\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all()->except($user->id);

        return response()->json([
            'data' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreUserRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated();

        $user = User::createUser($validated['name'], $validated['ruangan']);

        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'data' => $user
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
        $user = User::findOrFail($id);
        if ($user->exists()) {
            $user->delete();

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
