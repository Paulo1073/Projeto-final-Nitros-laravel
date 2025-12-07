<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;

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

    public function store(StoreWishlistRequest $request)
    {
        $validated = $request->validated();

        $imagePath = $request->file('image')->store('wishlists', 'public');

        Wishlist::create([
            'name'   => $validated['name'],
            'date'   => $validated['date'],
            'status' => $validated['status'],
            'image'  => $imagePath,
        ]);

        return redirect()->route('wishlists.index')->with('success', 'Jogo adicionado à wishlist!');
    }

    public function edit(Wishlist $wishlist)
    {
        return view('wishlists.edit', compact('wishlist'));
    }

    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $wishlist->image = $request->file('image')->store('wishlists', 'public');
        }

        $wishlist->update([
            'name'   => $validated['name'],
            'date'   => $validated['date'],
            'status' => $validated['status'],
            'image'  => $wishlist->image,
        ]);

        return redirect()->route('wishlists.index')->with('success', 'Wishlist atualizada com sucesso!');
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->route('wishlists.index')->with('success', 'Item removido da wishlist!');
    }
}
