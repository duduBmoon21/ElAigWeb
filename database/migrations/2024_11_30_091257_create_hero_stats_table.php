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
        Schema::create('hero_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_id')->constrained('heroes')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->string('icon');
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_stats');
    }
};
