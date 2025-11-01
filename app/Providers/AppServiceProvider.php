<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Game;


class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.navigation', function ($view) {
            $games = Game::all(); // ou só do usuário logado: Auth::user()->games
            $view->with('games', $games);
        });
    }

}
