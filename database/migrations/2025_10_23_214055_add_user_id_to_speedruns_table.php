<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('speedruns', function (Blueprint $table) {
            if (!Schema::hasColumn('speedruns', 'user_id')) {
                $table->foreignId('user_id')
                      ->constrained()
                      ->onDelete('cascade'); 
            }
        });
    }

    public function down(): void
    {
        Schema::table('speedruns', function (Blueprint $table) {
            if (Schema::hasColumn('speedruns', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
