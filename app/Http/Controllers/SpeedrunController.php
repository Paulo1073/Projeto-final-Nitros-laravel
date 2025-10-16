<?php

namespace App\Http\Controllers;

use App\Models\Speedrun;
use Illuminate\Http\Request;

class SpeedrunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speedruns = Speedrun::all();
        return view('speedruns.index', compact('speedruns'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Speedrun $speedrun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speedrun $speedrun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speedrun $speedrun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speedrun $speedrun)
    {
        //
    }
}
