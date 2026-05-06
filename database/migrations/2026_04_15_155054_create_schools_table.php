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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->nullable()->constrained()->nullOnDelete();

            $table->string('name');
            $table->string('code')->unique();
            $table->string('subdomain')->nullable()->unique(); 
            $table->string('domain')->nullable()->unique();    
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('status')->default('inactive'); // active, inactive, pending
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_token')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
