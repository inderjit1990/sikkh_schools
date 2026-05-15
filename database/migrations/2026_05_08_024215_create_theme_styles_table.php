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
            $table->string('background_color')->default('#ffffff'); // white
            $table->string('text_color')->default('#000000'); // black
            $table->string('font_family')->default('Arial, sans-serif');
            $table->string('button_color')->default('#1e3a8a'); // blue
            $table->string('button_text_color')->default('#ffffff'); // white
            $table->string('link_color')->default('#1e3a8a'); //
            $table->string('header_color')->default('#1e3a8a'); // blue
            $table->string('footer_color')->default('#1e3a8a'); //
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
