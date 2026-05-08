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
        Schema::create('theme_styles', function (Blueprint $table) {
            $table->id();
            $table->string('primary_color')->default('#1e3a8a'); // blue
            $table->string('secondary_color')->default('#f59e0b'); // amber
            $table->string('logo')->nullable();
            $table->string('theme')->default('default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_styles');
    }
};
