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
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->unsignedBigInteger('weekly_view_count');
            $table->unsignedBigInteger('monthly_view_count');
            $table->unsignedBigInteger('all_time_view_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('views');
    }
};
