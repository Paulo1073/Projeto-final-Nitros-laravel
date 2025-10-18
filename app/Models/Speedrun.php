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

 
    protected $casts = [
        'date' => 'date',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
