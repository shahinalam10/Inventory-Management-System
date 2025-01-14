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
        Schema::table('item_models', function (Blueprint $table) {
            $table->unique(['brand_id', 'name']); // Add unique constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_models', function (Blueprint $table) {
            $table->dropUnique(['brand_id', 'name']);
        });
    }
};
