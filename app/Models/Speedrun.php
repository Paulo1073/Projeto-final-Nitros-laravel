<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speedrun extends Model
{
    protected $fillable = [
        'game_id',
        'time',
        'mode',
        'date',
    ];

    // Relacionamento com Game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
