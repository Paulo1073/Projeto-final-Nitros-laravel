<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(StoreGameRequest $request)
    {
        $data = $request->validated();

        $data['imagem'] = $request->file('imagem')->store('games', 'public');
        $data['user_id'] = Auth::id();

        Game::create($data);

        return redirect()->route('games.index')->with('success', 'Jogo cadastrado com sucesso!');
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(UpdateGameRequest $request, Game $game)
    {
        $data = $request->validated();

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('games', 'public');
        }

        $game->update($data);

        return redirect()->route('games.index')->with('success', 'Game atualizado com sucesso!');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deletado com sucesso!');
    }
}
