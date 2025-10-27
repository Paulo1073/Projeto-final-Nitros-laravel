<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $friends = Friend::all();

        return view('friends.index', compact('friends'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('friends.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|not_in:'.auth()->id(),
            'bio' => 'nullable|string',
        ]);

        // Pega o usuário selecionado para salvar o nickname
        $user = \App\Models\User::find($validated['user_id']);

        Friend::create([
            'user_id' => $user->id,
            'nickname' => $user->nickname,
            'bio' => $validated['bio'],
        ]);

        return redirect()->route('friends.index')->with('success', 'Amigo adicionado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Friend $friend)
    {
        $users = \App\Models\User::where('id', '!=', auth()->id())->get();

        return view('friends.edit', compact('friend', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Friend $friend)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|not_in:'.auth()->id(),
            'bio' => 'nullable|string',
        ]);

        $user = \App\Models\User::find($validated['user_id']);

        $friend->update([
            'user_id' => $user->id,
            'nickname' => $user->nickname,
            'bio' => $validated['bio'],
        ]);

        return redirect()->route('friends.index')->with('success', 'Amigo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Friend $friend)
    {
        $friend->delete();

        return redirect()->route('friends.index')->with('success', 'Amigo removido com sucesso!');
    }
}
