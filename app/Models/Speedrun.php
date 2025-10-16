<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speedrun extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'tempo',
        'modo',
        'data'
    ];
}
