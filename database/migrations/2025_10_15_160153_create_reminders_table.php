<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade'); 
            $table->string('titulo')->nullable(); 
            $table->text('descricao'); 
            $table->boolean('concluido')->default(false); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
