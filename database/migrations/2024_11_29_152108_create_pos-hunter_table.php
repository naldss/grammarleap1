<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pos-hunter_table', function (Blueprint $table) {
            $table->id();
            $table->text('sentence');
            $table->enum('difficulty', ['easy', 'mid', 'hard']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos-hunter_table');
    }
};
