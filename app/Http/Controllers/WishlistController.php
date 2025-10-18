<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::all();
        return view('wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        return view('wishlists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'nullable|date',
            'status' => 'required|in:desired,purchased',
        ]);

        $imagePath = $request->file('image')->store('wishlists', 'public');

        Wishlist::create([
            'name' => $validated['name'],
            'date' => $validated['date'],
            'status' => $validated['status'],
            'image' => $imagePath,
        ]);

        return redirect()->route('wishlists.index')->with('success', 'Game added to wishlist!');
    }

    public function edit(Wishlist $wishlist)
    {
        return view('wishlists.edit', compact('wishlist'));
    }

    public function update(Request $request, Wishlist $wishlist)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'nullable|date',
            'status' => 'required|in:desired,purchased',
        ]);

        // Atualizar imagem apenas se houver upload
        if ($request->hasFile('image')) {
            $wishlist->image = $request->file('image')->store('wishlists', 'public');
        }

        $wishlist->update([
            'name' => $validated['name'],
            'date' => $validated['date'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('wishlists.index')->with('success', 'Wishlist updated successfully!');
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->route('wishlists.index')->with('success', 'Wishlist item deleted!');
    }
}
