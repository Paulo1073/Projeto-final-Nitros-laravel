<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::all();
        return view('wishlists.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wishlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
