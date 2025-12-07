<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Reminder;
use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = Reminder::with('game')->get();
        return view('reminders.index', compact('reminders'));
    }

    public function create()
    {
        $games = Game::all();
        return view('reminders.create', compact('games'));
    }

    public function store(StoreReminderRequest $request)
    {
        Reminder::create($request->validated());
        return redirect()->route('reminders.index')->with('success', 'Lembrete criado com sucesso!');
    }

    public function edit(Reminder $reminder)
    {
        $games = Game::all();
        return view('reminders.edit', compact('reminder', 'games'));
    }

    public function update(UpdateReminderRequest $request, Reminder $reminder)
    {
        $reminder->update($request->validated());
        return redirect()->route('reminders.index')->with('success', 'Lembrete atualizado com sucesso!');
    }

    public function destroy(Reminder $reminder)
    {
        $reminder->delete();
        return redirect()->route('reminders.index')->with('success', 'Lembrete excluído com sucesso!');
    }
}
