<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id(); // id auto incremental
            $table->string('titulo'); // título do jogo
            $table->string('genero')->nullable(); // gênero (ex: ação, aventura, etc.)
            $table->text('descricao')->nullable(); // descrição do jogo
            $table->string('plataforma')->nullable(); // plataforma (ex: PC, PS5, Xbox)
            $table->string('imagem')->nullable(); // caminho da imagem/capa do jogo
            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
