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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('found_date');
            $table->string('status')->default('Perdido');
            $table->date('returned_date')->nullable();
            $table->string('returned_to')->nullable();
            $table->unsignedBigInteger('category_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('location_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('condition_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
