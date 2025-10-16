<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('speedruns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->time('tempo');
            $table->string('modo');
            $table->date('data'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('speedruns');
    }
};

