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
        Schema::create('listes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('soustitre')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('type');
            $table->tinyInteger('verifie')->default(0);
            $table->string('visibilite')->default('privée');
            $table->integer('sauvegardes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listes');
    }
};
