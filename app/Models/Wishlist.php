<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'name',
        'image',
        'date',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
