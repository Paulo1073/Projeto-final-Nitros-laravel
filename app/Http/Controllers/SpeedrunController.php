<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Speedrun;
use Illuminate\Http\Request;

class SpeedrunController extends Controller
{
    public function index()
    {

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

        return redirect()->route('speedruns.index')->with('success', 'Speedrun cadastrada com sucesso!');
    }

    public function edit(Speedrun $speedrun)
    {
        $games = Game::all();
        return view('speedruns.edit', compact('speedrun', 'games'));
    }

    public function update(Request $request, Speedrun $speedrun)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'time' => 'required',
            'date' => 'required|date',
            'mode' => 'required|string|max:50',
        ]);

        $speedrun->update($request->all());

        return redirect()->route('speedruns.index')->with('success', 'Speedrun atualizada com sucesso!');
    }

    public function destroy(Speedrun $speedrun)
    {
        $speedrun->delete();
        return redirect()->route('speedruns.index')->with('success', 'Speedrun excluída com sucesso!');
    }
}
