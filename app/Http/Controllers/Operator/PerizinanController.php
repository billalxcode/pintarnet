<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Perizinan;
use App\Http\Requests\StorePerizinanRequest;
use App\Http\Requests\UpdatePerizinanRequest;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_perizinan = Perizinan::all();
        
        return view('operator.perizinan.home', [
            'data_perizinan' => $data_perizinan
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
    public function store(StorePerizinanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Perizinan $perizinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perizinan $perizinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerizinanRequest $request, Perizinan $perizinan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perizinan $perizinan)
    {
        //
    }
}
