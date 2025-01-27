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
        Schema::create('chansons', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->unsignedBigInteger('artiste_id');
            $table->foreign('artiste_id')->references('id')->on('artistes');
            $table->text('paroles');
            $table->text('album');
            $table->date('datePublication');
            $table->integer('duree');
            $table->integer('lectures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chansons');
    }
};
