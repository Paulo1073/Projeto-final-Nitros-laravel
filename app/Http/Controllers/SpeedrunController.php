<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Speedrun;
use Illuminate\Http\Request;

class SpeedrunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carrega o relacionamento com Game
        $speedruns = Speedrun::with('game')->get();
        return view('speedruns.index', compact('speedruns'));
    }

    public function create()
    {
        $games = Game::all();
        return view('speedruns.create', compact('games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'time' => 'required',
            'date' => 'required|date',
            'mode' => 'required|string|max:50',
        ]);

        Speedrun::create([
            'game_id' => $request->game_id,
            'time' => $request->time,
            'date' => $request->date,
            'mode' => $request->mode,
        ]);

        return redirect()->route('speedruns.index')->with('success', 'Speedrun criado com sucesso!');
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
