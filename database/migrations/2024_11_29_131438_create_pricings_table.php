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
            Schema::create('pricings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
                $table->foreignId('services_id')->constrained('services')->onDelete('cascade');
                $table->text('content');
                $table->decimal('price', 10, 2);
                $table->decimal('discount', 5, 2)->default(0); 
                $table->timestamps();
        
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_tables');
    }
};