<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use App\Http\Requests\StoreFriendRequest;
use App\Http\Requests\UpdateFriendRequest;

class FriendController extends Controller
{
    public function index()
    {
        $friends = Friend::all();
        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('friends.create', compact('users'));
    }

    public function store(StoreFriendRequest $request)
    {
        $validated = $request->validated();
        $user = User::find($validated['user_id']);

        Friend::create([
            'user_id' => $user->id,
            'nickname' => $user->nickname,
            'bio' => $validated['bio'],
        ]);

        return redirect()->route('friends.index')->with('success', 'Amigo adicionado com sucesso!');
    }

    public function edit(Friend $friend)
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('friends.edit', compact('friend', 'users'));
    }

    public function update(UpdateFriendRequest $request, Friend $friend)
    {
        $validated = $request->validated();
        $user = User::find($validated['user_id']);

        $friend->update([
            'user_id' => $user->id,
            'nickname' => $user->nickname,
            'bio' => $validated['bio'],
        ]);

        return redirect()->route('friends.index')->with('success', 'Amigo atualizado com sucesso!');
    }

    public function destroy(Friend $friend)
    {
        $friend->delete();

        return redirect()->route('friends.index')->with('success', 'Amigo removido com sucesso!');
    }
}
