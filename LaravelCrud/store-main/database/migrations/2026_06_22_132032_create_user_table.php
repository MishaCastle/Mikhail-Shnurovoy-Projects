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
        Schema::create('user', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('second_name');

            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();

            $table->string('login')->unique();
            $table->string('password');

            $table->boolean('is_verify_email')->default(false);
            $table->boolean('is_verify_phone')->default(false);

            $table->timestamps(); // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
