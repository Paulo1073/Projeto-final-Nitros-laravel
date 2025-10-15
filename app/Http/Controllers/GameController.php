<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  
        $games = Game::all();


        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'descricao' => 'required|string',
            'plataforma' => 'required|string|max:100',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('imagem')->store('games', 'public');

        Game::create([
            'titulo' => $validated['titulo'],
            'genero' => $validated['genero'],
            'descricao' => $validated['descricao'],
            'plataforma' => $validated['plataforma'],
            'imagem' => $imagePath,
        ]);


        // 🔹 Redirecionar com mensagem de sucesso
        return redirect()->route('games.index')->with('success', 'Jogo cadastrado com sucesso!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(game $game)
    {
        //
    }
}
