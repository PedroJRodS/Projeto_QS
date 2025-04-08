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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('description');
            $table->date('report_date');
            $table->string('reporter_name');
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
        Schema::dropIfExists('reports');
    }
};
