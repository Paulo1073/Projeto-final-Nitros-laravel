<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\SpeedrunController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// GAMES CRUD
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

//REMINDERS CRUD
Route::get('/reminders', [ReminderController::class, 'index'])->name('reminders.index');
Route::get('/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');
Route::get('/reminders/{reminder}/edit', [ReminderController::class, 'edit'])->name('reminders.edit');
Route::put('/reminders/{reminder}', [ReminderController::class, 'update'])->name('reminders.update');
Route::delete('/reminders/{reminder}', [ReminderController::class, 'destroy'])->name('reminders.destroy');

//FRIENDS CRUD
Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
Route::get('/friends/create', [FriendController::class, 'create'])->name('friends.create');
Route::post('/friends', [FriendController::class, 'store'])->name('friends.store');
Route::get('/friends/{friend}/edit', [FriendController::class, 'edit'])->name('friends.edit');
Route::put('/friends/{friend}', [FriendController::class, 'update'])->name('friends.update');
Route::delete('/friends/{friend}', [FriendController::class, 'destroy'])->name('friends.destroy');


//SPEEDRUNS CRUD
route::get('/speedruns', [SpeedrunController::class, 'index'])->name('speedruns.index');
route::get('/speedruns/create', [SpeedrunController::class, 'create'])->name('speedruns.create');
route::post('/speedruns', [SpeedrunController::class, 'store'])->name('speedruns.store');
route::get('/speedruns/{speedrun}/edit', [SpeedrunController::class, 'edit'])->name('speedruns.edit');
route::put('/speedruns/{speedrun}', [SpeedrunController::class, 'update'])->name('speedruns.update');
route::delete('/speedruns/{speedrun}', [SpeedrunController::class, 'destroy'])->name('speedruns.destroy');

//WISHLISTS CRUD
route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlists.index');
route::get('/wishlists/create', [WishlistController::class, 'create'])->name('wishlists.create');
route::post('/wishlists', [WishlistController::class, 'store'])->name('wishlists.store');
route::get('/wishlists/{wishlist}/edit', [WishlistController::class, 'edit'])->name('wishlists.edit');
route::put('/wishlists/{wishlist}', [WishlistController::class, 'update'])->name('wishlists.update');
route::delete('/wishlists/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlists.destroy');

