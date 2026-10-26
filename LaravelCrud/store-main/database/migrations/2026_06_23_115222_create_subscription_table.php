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
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();

            $table->foreignId('organization_id')
                ->constrained('organization')
                ->cascadeOnDelete();

            $table->foreignId('module_id')
                ->constrained('module')
                ->cascadeOnDelete();

            $table->date('date_start');
            $table->date('date_finish');

            $table->boolean('is_active')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe');
    }
};