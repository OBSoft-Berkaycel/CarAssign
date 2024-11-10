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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('vehicle_brands')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('vehicle_categories')->onDelete('cascade');
            $table->string('series');
            $table->string('model');
            $table->string('color');
            $table->integer('power');
            $table->date('year');
            $table->enum('gear', ['MANUAL', 'AUTOMATIC']);
            $table->enum('fuel', ['GASOLINE', 'DIESEL', 'HYBRID', 'ELECTRIC']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
