<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listes_chansons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chanson_id')->constrained('chansons')->onDelete('cascade');
            $table->foreignId('liste_id')->constrained('listes')->onDelete('cascade');
            $table->integer('ordre')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listes_chansons');
    }
};
