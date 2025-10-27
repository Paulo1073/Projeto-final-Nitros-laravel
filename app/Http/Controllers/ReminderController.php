<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Lista todos os lembretes
     */
    public function index()
    {
        $reminders = Reminder::with('game')->get();

        return view('reminders.index', compact('reminders'));
    }

    /**
     * Mostra o formulário de criação
     */
    public function create()
    {
        $games = Game::all();

        return view('reminders.create', compact('games'));
    }

    /**
     * Salva um novo lembrete
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
     * Mostra o formulário de edição
     */
    public function edit(Reminder $reminder)
    {
        $games = Game::all();

        return view('reminders.edit', compact('reminder', 'games'));
    }

    /**
     * Atualiza um lembrete existente
     */
    public function update(Request $request, Reminder $reminder)
    {
        $validated = $request->validate([
            'titulo' => 'nullable|string|max:255',
            'descricao' => 'required|string',
            'game_id' => 'required|exists:games,id',
            'concluido' => 'sometimes|boolean',
        ]);

        $reminder->update($validated);

        return redirect()->route('reminders.index')->with('success', 'Lembrete atualizado com sucesso!');
    }

    /**
     * Deleta um lembrete
     */
    public function destroy(Reminder $reminder)
    {
        $reminder->delete();

        return redirect()->route('reminders.index')->with('success', 'Lembrete excluído com sucesso!');
    }
}
