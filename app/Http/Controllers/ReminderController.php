<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use App\Http\Controllers\GameController;
use App\Models\Game;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reminders = Reminder::with('game')->get();
        return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::all();
        return view('reminders.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'nullable|string|max:255',
            'descricao' => 'required|string',
            'game_id' => 'required|exists:games,id',
        ]);

        Reminder::create([
            'game_id' => $validated['game_id'],
            'titulo' => $validated['titulo'],
            'descricao' => $validated['descricao'],
        ]);

        return redirect()->route('reminders.index')->with('success', 'Lembrete criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
