<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('item_models', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('item_models');
    }
};
