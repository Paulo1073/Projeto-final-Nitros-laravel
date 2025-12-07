<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Speedrun;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSpeedrunRequest;
use App\Http\Requests\UpdateSpeedrunRequest;

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

    public function store(StoreSpeedrunRequest $request)
    {
        Speedrun::create([
            'game_id' => $request->game_id,
            'time' => $request->time,
            'date' => $request->date,
            'mode' => $request->mode,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('speedruns.index')->with('success', 'Speedrun cadastrada com sucesso!');
    }

    public function edit(Speedrun $speedrun)
    {
        $games = Game::all();
        return view('speedruns.edit', compact('speedrun', 'games'));
    }

    public function update(UpdateSpeedrunRequest $request, Speedrun $speedrun)
    {
        $speedrun->update([
            'game_id' => $request->game_id,
            'time' => $request->time,
            'date' => $request->date,
            'mode' => $request->mode,
        ]);

        return redirect()->route('speedruns.index')->with('success', 'Speedrun atualizada com sucesso!');
    }

    public function destroy(Speedrun $speedrun)
    {
        $speedrun->delete();
        return redirect()->route('speedruns.index')->with('success', 'Speedrun excluída com sucesso!');
    }
}
